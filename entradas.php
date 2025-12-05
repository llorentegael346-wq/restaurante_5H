<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Entradas</h1>

        <div class="plato">
            <img src="imagenes/1.jpeg" alt="Sopa Minestrone" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Sopa Minestrone</span>
                <span class="precio">$180.00</span>
                <div class="descripcion">Sopa minestrone rica y reconfortante, elaborada con verduras frescas, legumbres y pasta, en un caldo sabroso y aromático.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Sopa Minestrone">
                    <input type="hidden" name="precio" value="180.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/2.jpg" alt="Crema de Elote y Cilantro" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Crema de Elote y Cilantro</span>
                <span class="precio">$160.00</span>
                <div class="descripcion">Crema suave de elote, delicadamente sazonada y acompañada de un toque fresco de cilantro, ideal para disfrutar un sabor reconfortante y aromático.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Crema de Elote y Cilantro">
                    <input type="hidden" name="precio" value="160.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Crema de Papa -->
        <div class="plato">
            <img src="imagenes/3.jpg" alt="Crema de Papa" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Crema de Papa</span>
                <span class="precio">$160.00</span>
                <div class="descripcion">Crema de papa suave y cremosa, perfectamente sazonada, que ofrece un sabor cálido y reconfortante en cada cucharada.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Crema de Papa">
                    <input type="hidden" name="precio" value="160.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Sopa de Puerro con Papa -->
        <div class="plato">
            <img src="imagenes/4.jpg" alt="Sopa de Puerro con Papa" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Sopa de Puerro con Papa</span>
                <span class="precio">$160.00</span>
                <div class="descripcion">Sopa de puerro y papa, cremosa y reconfortante, con un sabor delicado que resalta la frescura y suavidad.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Sopa de Puerro con Papa">
                    <input type="hidden" name="precio" value="160.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Crema de Coliflor -->
        <div class="plato">
            <img src="imagenes/5.jpg" alt="Crema de Coliflor" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Crema de Coliflor</span>
                <span class="precio">$160.00</span>
                <div class="descripcion">Crema de coliflor suave y delicada, perfectamente sazonada, que ofrece un sabor reconfortante y aterciopelado en cada cucharada.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Crema de Coliflor">
                    <input type="hidden" name="precio" value="160.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <h1>Aperitivos</h1>

        <!-- Volovanes -->
        <div class="plato">
            <img src="imagenes/6.jpg" alt="Volovanes" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Volovanes</span>
                <span class="precio">$200.00</span>
                <div class="descripcion">Volovanes delicados y crujientes rellenos de una suave mezcla de ingredientes frescos, ofreciendo un bocado ligero y lleno de sabor.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Volovanes">
                    <input type="hidden" name="precio" value="200.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/7.jpg" alt="Canasta de Pollo" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Canasta de Pollo</span>
                <span class="precio">$150.00</span>
                <div class="descripcion">Canasta crujiente rellena de jugosos trozos de pollo, acompañada de guarniciones frescas y salsas que realzan su sabor.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Canasta de Pollo">
                    <input type="hidden" name="precio" value="150.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/10.jpg" alt="Ensalada Caprese" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Ensalada Caprese</span>
                <span class="precio">$190.00</span>
                <div class="descripcion">Ensalada fresca y colorida, preparada con ingredientes variados y aderezo ligero, perfecta para disfrutar como entrada saludable y deliciosa.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Ensalada Caprese">
                    <input type="hidden" name="precio" value="190.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/11.jpg" alt="Rollito de Calabacín" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Rollito de Calabacín</span>
                <span class="precio">$230.00</span>
                <div class="descripcion">Delicado rollito de calabacín relleno de ingredientes frescos y sabrosos, horneado o grillado para realzar su sabor natural.</div>
                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="...">
                    <input type="hidden" name="platillo" value="Rollito de Calabacín">
                    <input type="hidden" name="precio" value="230.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <!-- Volver al inicio -->
        <a href="index.php" class="volver">Volver a inicio</a>
    </div>
</body>
</html>
