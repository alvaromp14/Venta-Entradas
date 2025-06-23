<?php
include_once '../modelo/evento.php';

class ConexionBD {
    private $conexion;

    // Constructor: Establece la conexión con la base de datos al instanciar la clase
    public function __construct() {
        $this->conexion = new mysqli('localhost', 'root', '', 'proyecto_eventos_php');
        $this->conexion->set_charset("utf8");

        // Verifica si hay errores de conexión
        if ($this->conexion->connect_errno) {
            die("Error al conectar con la base de datos: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la instancia de la conexión
    public function getConexion() {
        return $this->conexion;
    }

    // Método para cerrar la conexión con la base de datos
    public function cerrarConexion(){
        $this->conexion->close();
    }

    // Método para obtener y mostrar todos los eventos
    public function mostrarTodosEventos() {
        // Consulta SQL para obtener todos los eventos
        $query = "SELECT * FROM eventos";
        $result = $this->conexion->query($query);
    
        // Verifica si hay errores en la consulta
        if (!$result) {
            die("Error al obtener eventos: " . $this->conexion->error);
        }
    
        // Itera sobre los resultados y muestra la información de cada evento
        while ($evento = $result->fetch_assoc()) {
            echo '<div class="evento">';
            echo '<div class="img">';
            echo '<img src="../img/evento.jpg" alt="Evento">';
            echo '<div class="left">';
            echo '<h2>' . $evento['nombre'] . '</h2>';
            echo '<h4>' . $evento['fecha'] . '</h4>';
            echo '<span>Lugar: ' . $evento['lugar'] . '</span>&nbsp;&nbsp;&nbsp;&nbsp;';
            echo '<span>Aforo: ' . $evento['aforo'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="right">';
            echo '<h3>' . $evento['precio'] . ' €</h3>';
            
            // Formulario con un botón para agregar eventos al carrito
            echo '<form method="post" action="carrito.php">';
            echo '<input type="hidden" name="evento_id" value="' . $evento['id'] . '">';
            echo '<input type="hidden" name="evento_nombre" value="' . $evento['nombre'] . '">';
            echo '<input type="hidden" name="evento_fecha" value="' . $evento['fecha'] . '">';
            echo '<input type="hidden" name="evento_lugar" value="' . $evento['lugar'] . '">';
            echo '<input type="hidden" name="evento_aforo" value="' . $evento['aforo'] . '">';
            echo '<input type="hidden" name="evento_precio" value="' . $evento['precio'] . '">';
            echo '<input type="hidden" name="evento_iframe" value="' . $evento['iframe'] . '">';
            
            echo '<button type="submit" name="comprar">Comprar</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    }
}