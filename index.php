<?php
session_start();
include 'conexion.php';

// Si se envía el formulario de selección de mesa
if (isset($_POST['mesa'])) {
    $_SESSION['mesa'] = intval($_POST['mesa']);
    header("Location: entradas.php"); // Redirige al menú principal
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los Chefs Tocan</title>
    <link rel="stylesheet" href="estilo_index.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a el restaurante Los Chefs Tocan</h1>
        <p>Selecciona tu mesa para comenzar:</p>

        <form method="post" action="">
            <select name="mesa" required>
                <option value="">-- Selecciona una mesa --</option>
                <?php
                $sql = "SELECT Codigo, numero, estado FROM mesas ORDER BY numero ASC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $estado = ucfirst(strtolower($row['estado']));
                        $disabled = ($estado !== 'Disponible') ? 'disabled' : '';
                        echo "<option value='{$row['Codigo']}' $disabled>Mesa {$row['numero']} - {$estado}</option>";
                    }
                } else {
                    echo "<option value=''>No hay mesas registradas</option>";
                }
                $conn->close();
                ?>
            </select>

            <button type="submit" class="btn">Entrar al Menú</button>
        </form>

        <a href="mesero.php" class="btn" style="background:#db9e05;">Panel Mesero</a>
        
        <div class="footer">
            &copy; <?php echo date('Y'); ?> Restaurante Los Chefs Tocan
        </div>
    </div>
</body>
</html>
