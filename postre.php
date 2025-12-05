<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postres</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <!-- Barra horizontal de navegación -->
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Postres</h1>

        <!-- Flan Napolitano -->
        <div class="plato">
            <img src="imagenes/22.jpg" alt="Flan Napolitano" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Flan Napolitano</span>
                <span class="precio">$270.00</span>
                <div class="descripcion">Postre mexicano clásico cremoso y aterciopelado, elaborado con huevos, leche condensada y queso crema, bañado en un delicado caramelo líquido.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: caramelo">
                    <input type="hidden" name="platillo" value="Flan Napolitano">
                    <input type="hidden" name="precio" value="270.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Panacotta de Fresa -->
        <div class="plato">
            <img src="imagenes/23.jpg" alt="Panacotta de Fresa" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Panacotta de Fresa</span>
                <span class="precio">$279.99</span>
                <div class="descripcion">Postre italiano suave y cremoso elaborado con nata, azúcar y gelatina, servido con un toque de salsa de frutos rojos o caramelo.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: caramelo">
                    <input type="hidden" name="platillo" value="Panacotta de Fresa">
                    <input type="hidden" name="precio" value="279.99">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Tiramisú Clásico -->
        <div class="plato">
            <img src="imagenes/24.jpg" alt="Tiramisú Clásico" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Tiramisú Clásico</span>
                <span class="precio">$319.99</span>
                <div class="descripcion">Delicioso postre italiano en capas, con bizcochos empapados en café y licor, crema de mascarpone suave y un toque de cacao en polvo.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: cacao">
                    <input type="hidden" name="platillo" value="Tiramisú Clásico">
                    <input type="hidden" name="precio" value="319.99">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Pudding -->
        <div class="plato">
            <img src="imagenes/25.jpg" alt="Pudding" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Pudding</span>
                <span class="precio">$259.99</span>
                <div class="descripcion">Postre cremoso y reconfortante preparado con una base de leche, azúcar y espesantes, servido con un toque de vainilla o caramelo.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: vainilla">
                    <input type="hidden" name="platillo" value="Pudding">
                    <input type="hidden" name="precio" value="259.99">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Pay de Queso -->
        <div class="plato">
            <img src="imagenes/26.jpg" alt="Pay de Queso" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Pay de Queso</span>
                <span class="precio">$299.99</span>
                <div class="descripcion">Postre cremoso y delicado, con una suave mezcla de queso crema sobre una base crujiente de galleta, coronado con mermelada de frutos rojos o caramelo.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: mermelada">
                    <input type="hidden" name="platillo" value="Pay de Queso">
                    <input type="hidden" name="precio" value="299.99">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <a href="index.php" class="volver">Volver a inicio</a>
    </div>
</body>
</html>
