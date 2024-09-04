<?php
// Define la ruta a la raíz del proyecto
define('SERVERPATH', $_SERVER['DOCUMENT_ROOT']);

// Incluye el archivo de conexión
require_once(SERVERPATH . '/musicservice/configs/conexion.php'); // Ajusta la ruta según sea necesario

try {
    // Obtén la instancia de la conexión
    $conexion = Conexion::obtenerInstancia()->obtenerConexion();

    // Verifica si la conexión es exitosa
    if ($conexion) {
        echo "Conexión exitosa";
    } else {
        echo "Error al conectar";
    }
} catch (Exception $e) {
    // Muestra un mensaje de error si la conexión falla
    echo "Error: " . $e->getMessage();
}
?>





