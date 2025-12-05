<?php
include 'conexion.php';

if (!isset($_GET['pedido_id'])) {
    echo "<script>alert('No se especificó un pedido.'); window.location='index.php';</script>";
    exit;
}

$pedido_id = intval($_GET['pedido_id']);

// Obtener info del pedido
$sql_pedido = "
    SELECT p.*, m.numero AS mesa
    FROM pedido p
    INNER JOIN mesas m ON p.Codigomesas = m.Codigo
    WHERE p.Codigo = ?
";
$stmt = $conn->prepare($sql_pedido);
$stmt->bind_param("i", $pedido_id);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();

// Obtener los productos
$sql_detalle = "SELECT * FROM confirmar_pedido WHERE CodigoPedido = ?";
$stmt2 = $conn->prepare($sql_detalle);
$stmt2->bind_param("i", $pedido_id);
$stmt2->execute();
$detalles = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket Los Chefs Tocan</title>
    <link rel="stylesheet" href="tiket.css">
</head>
<body>
<div class="ticket">
    <h2>🍽️ Ticket de Pedido</h2>
    <h2>Restaurante Los Chefs Tocan</h2>
    <p><strong>Mesa:</strong> <?= $pedido['mesa'] ?></p>
    <p><strong>Fecha:</strong> <?= $pedido['fecha'] ?></p>
    <hr>
    <table>
        <tr>
            <th>Platillo</th>
            <th>Cant.</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($row = $detalles->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['platillo']) ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td>$<?= number_format($row['precio'], 2) ?></td>
            <td>$<?= number_format($row['precio'] * $row['cantidad'], 2) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <hr>
    <h3>Total: $<?= number_format($pedido['total'], 2) ?></h3>
    <button onclick="window.print()">🖨️ Imprimir Ticket</button>
    <br><br>
    <a href="index.php">← Volver al inicio</a>
</div>
</body>
</html>
