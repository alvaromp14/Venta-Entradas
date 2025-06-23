<?php
include_once '../dao/conexionBD.php';  // Incluir el archivo de conexión a la base de datos
session_start();  // Iniciar la sesión

// Función para eliminar un elemento del carrito
function eliminarDelCarrito($evento_id) {
    // Buscar el índice del evento en el carrito
    foreach ($_SESSION['carrito'] as $indice => $item) {
        if ($item['id'] == $evento_id) {
            // Eliminar el evento del carrito
            unset($_SESSION['carrito'][$indice]);
            // Reorganizar los índices del array para evitar índices dispersos
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            break; // Salir del bucle después de eliminar el evento
        }
    }
}

if (isset($_POST['comprar'])) {
    // Obtener la información del evento que se compró
    $evento_id = $_POST['evento_id'];
    $evento_nombre = $_POST['evento_nombre'];
    $evento_fecha = $_POST['evento_fecha'];
    $evento_lugar = $_POST['evento_lugar'];
    $evento_aforo = $_POST['evento_aforo'];
    $evento_precio = $_POST['evento_precio'];
    $evento_iframe = $_POST['evento_iframe'];

    // Almacenar la información en la sesión
    $_SESSION['carrito'][] = array(
        'id' => $evento_id,
        'nombre' => $evento_nombre,
        'fecha' => $evento_fecha,
        'lugar' => $evento_lugar,
        'aforo' => $evento_aforo,
        'precio' => $evento_precio,
        'iframe' => $evento_iframe
    );
}

// Eliminar un elemento del carrito si se hace clic en el botón de eliminar
if (isset($_POST['eliminar'])) {
    $evento_id_a_eliminar = $_POST['evento_id'];
    eliminarDelCarrito($evento_id_a_eliminar);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="../vista/index.php" class="logo"><img src="../img/logo.png" alt="Logo"></a>
            <h1>Eventos X</h1>
            <a href="../vista/carrito.php" class="carrito"><img src="../img/carro.png" alt="Carrito"></a>
        </div>
    </header>
    
    <section>
        <h2>Carrito</h2>

        <?php
        // Mostrar elementos en el carrito
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                echo '<div class="evento">';
                echo '<div class="img">';
                echo '<img src="../img/evento.jpg" alt="Evento">';
                echo '<div class="left">';
                echo '<h2>' . $item['nombre'] . '</h2>';
                echo '<h4>' . $item['fecha'] . '</h4>';
                echo '<span>Lugar: ' . $item['lugar'] . '</span>&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<span>Aforo: ' . $item['aforo'] . '</span>';
                echo '</div>';
                echo '</div>';
                echo '<div class="right">';
                echo '<h3>' . $item['precio'] . ' €</h3>';
                // Añadir un formulario con un botón de eliminar
                echo '<form method="post" action="carrito.php">';
                echo '<input type="hidden" name="evento_id" value="' . $item['id'] . '">';
                echo '<input type="hidden" name="evento_nombre" value="' . $item['nombre'] . '">';
                echo '<input type="hidden" name="evento_precio" value="' . $item['precio'] . '">';
                echo '<button type="submit" name="eliminar">Eliminar</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '<div><iframe src="' . $item['iframe'] . '" width="300" height="225" allowfullscreen></iframe></div>';
                echo '<br><br>';
            }
            echo '<form method="post" action="../vista/form_compra.php">';
            echo '<button type="submit">Finalizar compra</button>';
            echo '</form>';
        } else {
            echo '<p>El carrito está vacío.</p>';
        }
        ?>
    </section>
</body>
</html>