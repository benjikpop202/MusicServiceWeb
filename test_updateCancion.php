<?php
// Incluir la conexión a la base de datos y el controlador de canciones
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/CancionesController.php'); // Incluye el controlador, que depende del modelo

// Simular los datos de un formulario POST para actualizar una canción
$_SERVER["REQUEST_METHOD"] = "POST"; // Simula que es una solicitud POST
$_POST['id'] = 1;                     // Cambia este ID por el ID de una canción existente
$_POST['nombre'] = 'New Song Title'; // Nuevo título de la canción
$_POST['artista'] = 'New Artist Name'; // Nuevo nombre del artista
$_POST['genero'] = 'Rock';             // Nuevo género de la canción

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Database();
    $db = $database->getDb();

    // Crear instancia del controlador de Canciones
    $cancionesController = new CancionesController($db);

    // Llamar al método para actualizar la canción
    $cancionesController->actualizarCancion();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
