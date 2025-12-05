<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platillos</title>
    <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1>Platos Fuertes</h1>

        <!-- Pollo a la parrilla -->
        <div class="plato">
            <img src="imagenes/12.jpg" alt="Lomo de Cerdo" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Lomo de Cerdo</span>
                <span class="precio">$380.00</span>
                <div class="descripcion">Jugoso lomo de cerdo finamente sazonado y cocinado al punto, acompañado de una salsa especial que realza su sabor y textura.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: ensalada">
                    <input type="hidden" name="platillo" value="Lomo de Cerdo">
                    <input type="hidden" name="precio" value="380.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/13.jpg" alt="Pollo al Romero" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Pollo al Romero</span>
                <span class="precio">$280.00</span>
                <div class="descripcion">Pollo tierno y jugoso sazonado con romero fresco y especias aromáticas, cocinado lentamente para resaltar su sabor y aroma.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: ensalada">
                    <input type="hidden" name="platillo" value="Pollo al Romero">
                    <input type="hidden" name="precio" value="280.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/14.jpg" alt="Filete de Res" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Filete de Res</span>
                <span class="precio">$750.00</span>
                <div class="descripcion">Filete de res suave y jugoso, cuidadosamente sellado y sazonado, acompañado de una salsa fina que realza su sabor.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: ensalada">
                    <input type="hidden" name="platillo" value="Filete de Res">
                    <input type="hidden" name="precio" value="750.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/15.jpg" alt="Filete de Res suave y jugoso" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Filete de Res suave y jugoso</span>
                <span class="precio">$700.00</span>
                <div class="descripcion">Corte de carne seleccionado, tierno y jugoso, cuidadosamente sazonado y cocinado al punto para resaltar su sabor natural.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: ensalada">
                    <input type="hidden" name="platillo" value="Filete de Res suave y jugoso">
                    <input type="hidden" name="precio" value="700.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/16.jpg" alt="Espaghetti a la Carbonara" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Espaghetti a la Carbonara</span>
                <span class="precio">$280.00</span>
                <div class="descripcion">Espaghetti al dente combinado con una cremosa salsa carbonara, elaborada con tocino crujiente, huevo y queso parmesano.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: tocino">
                    <input type="hidden" name="platillo" value="Espaghetti a la Carbonara">
                    <input type="hidden" name="precio" value="280.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <h1>Guarnición</h1>

        <div class="plato">
            <img src="imagenes/17.jpg" alt="Papa con Salsa de Tomate" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Papa con Salsa de Tomate</span>
                <span class="precio">$250.00</span>
                <div class="descripcion">Papas crujientes bañadas en una suave y deliciosa salsa de tomate, con un toque de especias.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: salsa">
                    <input type="hidden" name="platillo" value="Papa con Salsa de Tomate">
                    <input type="hidden" name="precio" value="250.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/18.jpg" alt="Fetuchine a la Carbonara" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Fetuchine a la Carbonara</span>
                <span class="precio">$280.00</span>
                <div class="descripcion">Fetuchini al dente mezclado con una cremosa salsa carbonara, elaborada con tocino, huevo y queso parmesano.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: tocino">
                    <input type="hidden" name="platillo" value="Fetuchine a la Carbonara">
                    <input type="hidden" name="precio" value="280.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/19.jpg" alt="Ensalada Primavera" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Ensalada Primavera</span>
                <span class="precio">$280.00</span>
                <div class="descripcion">Ensalada fresca y colorida preparada con verduras de temporada, acompañada de un aderezo ligero.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: aderezo">
                    <input type="hidden" name="platillo" value="Ensalada Primavera">
                    <input type="hidden" name="precio" value="280.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/20.jpg" alt="Pasta con Salsa Pomodoro" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Pasta con Salsa Pomodoro</span>
                <span class="precio">$320.00</span>
                <div class="descripcion">Pasta al dente servida con una salsa pomodoro tradicional, elaborada con tomates frescos, ajo y albahaca.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: ajo">
                    <input type="hidden" name="platillo" value="Pasta con Salsa Pomodoro">
                    <input type="hidden" name="precio" value="320.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <div class="plato">
            <img src="imagenes/21.jpg" alt="Ensalada César" class="plato-img">
            <div class="plato-info">
                <span class="nombre">Ensalada César</span>
                <span class="precio">$250.00</span>
                <div class="descripcion">Ensalada clásica preparada con lechuga romana, aderezo César, crotones y queso parmesano.</div>

                <form class="formulario" action="ordenar.php" method="post">
                    <label>Cantidad:</label>
                    <input type="number" name="cantidad" min="1" value="1" required>
                    <br>
                    <label>Quitar ingredientes (opcional):</label>
                    <input type="text" name="sin_ingredientes" placeholder="Ej: crotones">
                    <input type="hidden" name="platillo" value="Ensalada César">
                    <input type="hidden" name="precio" value="250.00">
                    <br>
                    <button type="submit" class="pedido-btn">Agregar a pedido</button>
                </form>
            </div>
        </div>

        <a href="index.php" class="volver">Volver a inicio</a>
    </div>
</body>
</html>
