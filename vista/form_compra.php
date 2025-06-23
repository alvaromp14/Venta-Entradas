<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de compra</title>
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
        <h2>Formulario de compra</h2>
        <form method="post" action="../controlador/cont_form_compra.php">
            <br>
            <label><b>Nombre completo: </b></label>&nbsp;
            <input type="text" name="nombre" required>
            <br><br>
            <label><b>Correo electr&oacute;nico: </b></label>&nbsp;
            <input type="email" name="email" required>
            <br><br>
            <label><b>N&uacute;mero de tel&eacute;fono: </b></label>&nbsp;
            <input type="number" name="telf" required>
            <br><br>
            <button type="submit">Enviar</button>
        </form>
    </section>
</body>
</html>