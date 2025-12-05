<?php
session_start();

// Actualizar cantidad de un producto
if (isset($_POST['actualizar'])) {
    $index = $_POST['index'];
    $cantidad = max(1, intval($_POST['cantidad'])); // mínimo 1
    $_SESSION['carrito'][$index]['cantidad'] = $cantidad;
    header("Location: carrito.php");
    exit;
}

// Eliminar producto
if (isset($_POST['eliminar'])) {
    $index = $_POST['index'];
    unset($_SESSION['carrito'][$index]);
    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // reindexar
    header("Location: carrito.php");
    exit;
}

// Vaciar carrito
if (isset($_POST['vaciar'])) {
    $_SESSION['carrito'] = [];
    header("Location: carrito.php");
    exit;
}

// Carrito actual
$carrito = $_SESSION['carrito'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">

    <!-- ✅ Mensaje de confirmación del pedido -->
    <?php if (isset($_SESSION['mensaje_pedido'])): ?>
        <div class="mensaje-exito">
            <?= $_SESSION['mensaje_pedido']; ?>
        </div>
        <?php unset($_SESSION['mensaje_pedido']); ?>
    <?php endif; ?>

    <h1>🛒 Tu pedido</h1>

    <?php if (empty($carrito)): ?>
        <p>No hay platillos en tu pedido aún.</p>
    <?php else: ?>
        <table class="tabla-carrito">
            <tr>
                <th>Platillo</th>
                <th>Cantidad</th>
                <th>Sin ingredientes</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($carrito as $index => $item): 
                $subtotal = $item['precio'] * $item['cantidad'];
                $total += $subtotal;
            ?>
            <tr>
                <td><?= htmlspecialchars($item['platillo']) ?></td>
                <td>
                    <form method="post" style="display:inline-block;">
                        <input type="number" name="cantidad" value="<?= $item['cantidad'] ?>" min="1">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button type="submit" name="actualizar">Actualizar</button>
                    </form>
                </td>
                <td><?= htmlspecialchars($item['sin_ingredientes']) ?: '-' ?></td>
                <td>$<?= number_format($item['precio'], 2) ?></td>
                <td>$<?= number_format($subtotal, 2) ?></td>
                <td>
                    <form method="post" style="display:inline-block;">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button type="submit" name="eliminar" class="btn-eliminar">X</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3>Total: $<?= number_format($total, 2) ?></h3>

        <div class="acciones">
            <form method="post">
                <button type="submit" name="vaciar">Vaciar pedido</button>
            </form>

            <form method="post" action="finalizar_pedido.php">
                <button type="submit" name="finalizar">Ordenar</button>
            </form>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
