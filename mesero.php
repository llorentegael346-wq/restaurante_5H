<?php
session_start();
include 'conexion.php';

define('CLAVE_MESERO', '1234mesero');

// 🔐 LOGIN DEL MESERO
if (isset($_POST['password'])) {
    $pass = $_POST['password'];
    if ($pass === CLAVE_MESERO) {
        $_SESSION['mesero_logueado'] = true;
        header("Location: mesero.php");
        exit;
    } else {
        $error = "❌ Contraseña incorrecta.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: mesero.php");
    exit;
}

if (!isset($_SESSION['mesero_logueado'])):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso del Mesero</title>
    <link rel="stylesheet" href="estilos_meseros.css">
</head>
<body>
    <div class="login-box">
        <h2>🔐 Panel del Mesero</h2>
        <p>Introduce la contraseña para continuar</p>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="index.php">← Volver al Inicio</a>
    </div>
</body>
</html>
<?php
exit;
endif;

// 🧾 LIBERAR MESA
if (isset($_GET['liberar'])) {
    $mesa_id = intval($_GET['liberar']);
    $conn->query("UPDATE mesas SET estado = 'Disponible' WHERE Codigo = $mesa_id");
    $conn->query("UPDATE pedido SET estado = 'Finalizado' WHERE Codigomesas = $mesa_id AND estado = 'Pendiente'");
    echo "<script>alert('✅ Mesa liberada correctamente.'); window.location='mesero.php';</script>";
    exit;
}

// 📋 CONSULTAR MESAS
$sql_mesas = "SELECT * FROM mesas ORDER BY numero ASC";
$mesas = $conn->query($sql_mesas);

// 📦 CONSULTAR PEDIDOS PENDIENTES
$sql_pedidos = "
    SELECT 
        p.Codigo AS pedido_id,
        m.numero AS mesa,
        p.fecha,
        p.total,
        p.estado,
        cp.platillo,
        cp.cantidad,
        cp.sin_ingredientes
    FROM pedido p
    INNER JOIN mesas m ON p.Codigomesas = m.Codigo
    LEFT JOIN confirmar_pedido cp ON cp.CodigoPedido = p.Codigo
    WHERE p.estado = 'Pendiente'
    ORDER BY p.fecha DESC
";
$pedidos = $conn->query($sql_pedidos);

// Agrupar pedidos
$agrupados = [];
while ($row = $pedidos->fetch_assoc()) {
    $id = $row['pedido_id'];
    if (!isset($agrupados[$id])) {
        $agrupados[$id] = [
            'mesa' => $row['mesa'],
            'fecha' => $row['fecha'],
            'total' => $row['total'],
            'estado' => $row['estado'],
            'platillos' => [],
            'cantidades' => [],
            'detalles' => []
        ];
    }
    $agrupados[$id]['platillos'][] = $row['platillo'];
    $agrupados[$id]['cantidades'][] = $row['cantidad'];
    $agrupados[$id]['detalles'][] = $row['sin_ingredientes'] ?: '—';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Mesero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="estilos_mesero2.css">
</head>
<body>
    <div class="container">
        <div class="logout">
            <a href="mesero.php?logout=1">Cerrar sesión</a>
        </div>

        <h1>🍽️ Panel del Mesero</h1>

        <h2>Mesas registradas</h2>
        <table>
            <tr>
                <th>Mesa</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            <?php
            if ($mesas->num_rows > 0) {
                while ($m = $mesas->fetch_assoc()) {
                    $color = ($m['estado'] === 'Disponible') ? 'green' : 'red';
                    echo "<tr>
                            <td>Mesa {$m['numero']}</td>
                            <td style='color: $color;'>{$m['estado']}</td>
                            <td>";
                    if ($m['estado'] === 'Ocupada') {
                        echo "<a href='mesero.php?liberar={$m['Codigo']}' class='btn btn-liberar'>Liberar</a>";
                    } else {
                        echo "<span style='color:#999;'>—</span>";
                    }
                    echo "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay mesas registradas</td></tr>";
            }
            ?>
        </table>

        <h2>Pedidos pendientes</h2>
        <table>
            <tr>
                <th># Pedido</th>
                <th>Mesa</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Platillos</th>
                <th>Cantidades</th>
                <th>Detalles</th>
            </tr>
            <?php
            if (!empty($agrupados)) {
                $contador = 1;
                foreach ($agrupados as $id => $p) {
                    echo "<tr>
                            <td>" . $contador++ . "</td>
                            <td>Mesa {$p['mesa']}</td>
                            <td>{$p['fecha']}</td>
                            <td>$" . number_format($p['total'], 2) . "</td>
                            <td>{$p['estado']}</td>
                            <td style='text-align:left'>" . implode('<br>', $p['platillos']) . "</td>
                            <td>" . implode('<br>', $p['cantidades']) . "</td>
                            <td style='text-align:left'>" . implode('<br>', $p['detalles']) . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay pedidos pendientes</td></tr>";
            }
            ?>
        </table>

        <?php
        // 🔹 Calcular y mostrar totales por mesa debajo de la tabla
        if (!empty($agrupados)) {
            $totales_mesas = [];
            foreach ($agrupados as $id => $p) {
                $mesa = $p['mesa'];
                if (!isset($totales_mesas[$mesa])) {
                    $totales_mesas[$mesa] = 0;
                }
                $totales_mesas[$mesa] += $p['total'];
            }

            echo "<div class='totales-mesas'>";
            echo "<h3 Total por mesa</h3>";
            foreach ($totales_mesas as $mesa => $total) {
                echo "<p><strong>Mesa {$mesa}:</strong> $" . number_format($total, 2) . "</p>";
            }
            echo "</div>";
        }
        ?>

        <a href="index.php" class="btn-back">← Volver al Inicio</a>
    </div>
</body>
</html>
