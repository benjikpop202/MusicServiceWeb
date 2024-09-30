<?php
// Incluir la conexión a la base de datos y el controlador de canciones
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/CancionesController.php'); // Incluye el controlador, que depende del modelo

// Simular los datos de un formulario POST
$_SERVER["REQUEST_METHOD"] = "POST";  // Simula que es una solicitud POST
$_POST['nombre'] = 'Song Title';      // Cambia estos valores por una canción real
$_POST['artista'] = 'Artist Name';    // Nombre del artista
$_POST['genero'] = 'Pop';             // Género de la canción

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Database();
    $db = $database->getDb();

    // Crear instancia del controlador de Canciones
    $cancionesController = new CancionesController($db);

    // Llamar al método para crear una canción
    $cancionesController->crearCancion();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
