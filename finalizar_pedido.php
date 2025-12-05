<?php
session_start();
include 'conexion.php';

// ✅ Verificar que haya productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<script>alert('No hay productos en el pedido.'); window.location='carrito.php';</script>";
    exit;
}

// ✅ Verificar mesa seleccionada
if (!isset($_SESSION['mesa'])) {
    echo "<script>alert('No se ha seleccionado una mesa.'); window.location='index.php';</script>";
    exit;
}

$mesa_id = intval($_SESSION['mesa']);
$estado_pedido = 'Pendiente';
$fecha = date('Y-m-d H:i:s');

// ✅ Calcular total del pedido actual
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += floatval($item['precio']) * intval($item['cantidad']);
}

// ✅ Verificar que la mesa exista
$sql_check = "SELECT Codigo FROM mesas WHERE Codigo = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $mesa_id);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('⚠️ La mesa seleccionada no existe en la base de datos.'); window.location='carrito.php';</script>";
    exit;
}

// 🔹 Verificar si ya hay un pedido pendiente para esa mesa
$sql_existente = "SELECT Codigo, total FROM pedido WHERE Codigomesas = ? AND estado = 'Pendiente' LIMIT 1";
$stmt_existente = $conn->prepare($sql_existente);
$stmt_existente->bind_param("i", $mesa_id);
$stmt_existente->execute();
$res_existente = $stmt_existente->get_result();

if ($res_existente->num_rows > 0) {
    // 🧾 Ya existe un pedido pendiente → se actualiza
    $pedido_existente = $res_existente->fetch_assoc();
    $pedido_id = $pedido_existente['Codigo'];
    $nuevo_total = $pedido_existente['total'] + $total;

    // 🔹 Insertar los nuevos productos al pedido existente
    $sql_detalle = "INSERT INTO confirmar_pedido (CodigoPedido, platillo, cantidad, precio, sin_ingredientes)
                    VALUES (?, ?, ?, ?, ?)";
    $stmt_detalle = $conn->prepare($sql_detalle);

    foreach ($_SESSION['carrito'] as $item) {
        $platillo = $item['platillo'];
        $cantidad = intval($item['cantidad']);
        $precio = floatval($item['precio']);
        $sin_ingredientes = isset($item['sin_ingredientes']) ? $item['sin_ingredientes'] : '';
        $stmt_detalle->bind_param("isids", $pedido_id, $platillo, $cantidad, $precio, $sin_ingredientes);
        $stmt_detalle->execute();
    }

    // 🔹 Actualizar total del pedido
    $sql_update_total = "UPDATE pedido SET total = ?, fecha = ? WHERE Codigo = ?";
    $stmt_update = $conn->prepare($sql_update_total);
    $stmt_update->bind_param("dsi", $nuevo_total, $fecha, $pedido_id);
    $stmt_update->execute();

} else {
    // 🆕 No hay pedido → crear uno nuevo
    $sql_pedido = "INSERT INTO pedido (Codigomesas, fecha, total, estado) VALUES (?, ?, ?, ?)";
    $stmt_pedido = $conn->prepare($sql_pedido);
    $stmt_pedido->bind_param("isds", $mesa_id, $fecha, $total, $estado_pedido);
    $stmt_pedido->execute();
    $pedido_id = $conn->insert_id;

    // 🔹 Insertar los productos
    $sql_detalle = "INSERT INTO confirmar_pedido (CodigoPedido, platillo, cantidad, precio, sin_ingredientes)
                    VALUES (?, ?, ?, ?, ?)";
    $stmt_detalle = $conn->prepare($sql_detalle);
    foreach ($_SESSION['carrito'] as $item) {
        $platillo = $item['platillo'];
        $cantidad = intval($item['cantidad']);
        $precio = floatval($item['precio']);
        $sin_ingredientes = isset($item['sin_ingredientes']) ? $item['sin_ingredientes'] : '';
        $stmt_detalle->bind_param("isids", $pedido_id, $platillo, $cantidad, $precio, $sin_ingredientes);
        $stmt_detalle->execute();
    }

    // 🔹 Marcar mesa como ocupada
    $sql_update_mesa = "UPDATE mesas SET estado = 'Ocupada' WHERE Codigo = ?";
    $stmt_mesa = $conn->prepare($sql_update_mesa);
    $stmt_mesa->bind_param("i", $mesa_id);
    $stmt_mesa->execute();
}

// 🔹 Limpiar carrito
unset($_SESSION['carrito']);

// ✅ Guardar mensaje
$_SESSION['mensaje_pedido'] = "✅ ¡Pedido enviado! En un momento te traemos tu orden. ¡Gracias por tu preferencia!";

// 🔹 Redirigir a la página del ticket
header("Location: tiket.php?pedido_id=$pedido_id");
exit;

// 🔹 Cerrar conexiones
$stmt_check->close();
$conn->close();
?>
