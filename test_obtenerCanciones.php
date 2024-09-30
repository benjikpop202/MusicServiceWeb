<?php
// Incluir la conexión a la base de datos y el controlador de canciones
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php');  // Incluye el modelo
require_once('./Controllers/CancionesController.php'); // Incluye el controlador

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Database();
    $db = $database->getDb();

    // Crear instancia del controlador de Canciones
    $cancionesController = new CancionesController($db);

    // Llamar al método para obtener todas las canciones
    $cancionesController->obtenerCanciones(); // Asegúrate de que esta línea solo aparezca una vez

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
