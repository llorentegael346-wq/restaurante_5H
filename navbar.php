<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carrito</title>
     <link rel="stylesheet" href="estilos_menu.css">
</head>
<body>
    <div class="navbar">
         <a href="entradas.php" class="<?= basename($_SERVER['PHP_SELF'])=='entradas.php' ? 'active' : '' ?>">Entradas y Aperitivos</a>
         <a href="menu.php" class="<?= basename($_SERVER['PHP_SELF'])=='menu.php' ? 'active' : '' ?>">Platillos Fuertes y Guarniciones</a>
         <a href="postre.php" class="<?= basename($_SERVER['PHP_SELF'])=='postre.php' ? 'active' : '' ?>">Postres</a>
         <a href="bebidas.php" class="<?= basename($_SERVER['PHP_SELF'])=='bebidas.php' ? 'active' : '' ?>">Bebidas</a>
    
         <!-- 🛒 Carrito -->
         <a href="carrito.php" class="carrito-link">
          🛒 <span class="contador">
            <?= isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0 ?>
           </span>
         </a>
    </div>
</body>
</html>
