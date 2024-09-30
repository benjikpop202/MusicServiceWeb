<?php
// Incluir la conexión a la base de datos y el controlador de canciones
require_once('./configs/Conexion.php');
require_once('./Model/DatabaseModel.php');
require_once('./controllers/CancionesController.php');

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Database();
    $db = $database->getDb();

    // Crear instancia del controlador de Canciones
    $cancionesController = new CancionesController($db);

    // ID de la canción que deseas obtener (cambia esto por un ID válido que tengas en tu base de datos)
    $id = 1; // Cambia esto al ID de la canción que quieres probar

    // Llamar al método para obtener la canción por ID
    $cancionesController->obtenerCancionPorId($id);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
