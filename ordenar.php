<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $platillo = $_POST['platillo'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $sin_ingredientes = $_POST['sin_ingredientes'];

    // Si el carrito no existe, lo creamos
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregamos el platillo al carrito
    $_SESSION['carrito'][] = [
        'platillo' => $platillo,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'sin_ingredientes' => $sin_ingredientes
    ];

    // Redirigimos al carrito
    header('Location: carrito.php');
    exit;
}
?>