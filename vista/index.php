<?php
// Incluir el archivo de conexión a la base de datos
include_once '../dao/conexionBD.php';

// Crear una instancia de la clase ConexionBD
$conexionBD = new ConexionBD();

// Iniciar la sesión para manejar el carrito
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <!-- Enlace al inicio con el logo -->
            <a href="../vista/index.php" class="logo"><img src="../img/logo.png" alt="Logo"></a>
            <h1>Eventos X</h1>
            <!-- Enlace al carrito de compras -->
            <a href="../vista/carrito.php" class="carrito"><img src="../img/carro.png" alt="Carrito"></a>
        </div>
    </header>
    
    <section>
        <h2>Eventos</h2>

        <?php
        // Llamar al método para mostrar todos los eventos
        $conexionBD->mostrarTodosEventos();
        ?>

    </section>

    <?php
    // Cerrar la conexión después de usarla
    $conexionBD->cerrarConexion();
    ?>

</body>
</html>