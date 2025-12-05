<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <!-- Barra horizontal de navegación -->
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Bebidas</h1>

        <!-- Agua -->
        <div class="plato">
            <img src="imagenes/27.jpg" alt="Agua" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Agua</span>
                <span class="precio">$119.99</span>
                <div class="descripcion">Agua pura de manantial cuidadosamente embotellada para ofrecer una hidratación cristalina y refrescante.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: sin hielo">
                    <input type="hidden" name="platillo" value="Agua">
                    <input type="hidden" name="precio" value="119.99">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Vino tinto -->
        <div class="plato">
            <img src="imagenes/28.jpg" alt="Vino tinto" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Vino Tinto</span>
                <span class="precio">$3000.00</span>
                <div class="descripcion">Exquisita selección de cepas nobles, con aromas intensos y sabores equilibrados, perfecta para acompañar tus platillos con un toque de elegancia.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: sin hielo">
                    <input type="hidden" name="platillo" value="Vino Tinto">
                    <input type="hidden" name="precio" value="3000.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Vino blanco -->
        <div class="plato">
            <img src="imagenes/29.jpg" alt="Vino blanco" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Vino Blanco</span>
                <span class="precio">$2000.00</span>
                <div class="descripcion">Elegante selección de uvas finas, con notas frescas y afrutadas, perfecta para complementar tus platillos con un toque de ligereza y sofisticación.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: sin hielo">
                    <input type="hidden" name="platillo" value="Vino Blanco">
                    <input type="hidden" name="precio" value="2000.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Vino rosado -->
        <div class="plato">
            <img src="imagenes/31.jpg" alt="Vino rosado" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Vino Rosado</span>
                <span class="precio">$2100.00</span>
                <div class="descripcion">Sofisticado blend de uvas selectas, con un vibrante bouquet de frutos rojos y matices florales, perfecto para realzar tus platillos con elegancia y frescura.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: sin hielo">
                    <input type="hidden" name="platillo" value="Vino Rosado">
                    <input type="hidden" name="precio" value="2100.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Volver -->
        <a href="index.php" class="volver">Volver a inicio</a>
    </div>
</body>
</html>
