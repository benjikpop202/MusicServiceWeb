<?php
include_once(__DIR__ . '/../Model/CancionModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); // se incluye la conexión a la base de datos
include_once(__DIR__ . '/../controllers/CancionesController.php'); // Incluye el controlador de canciones
include_once(__DIR__. '/../controllers/CancionListaController.php');

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de canciones
$cancionController = new CancionesController($db);
$cancionListaController = new CancionListaController($db);

// Obtener la acción desde la URL o establecerla por defecto
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Gestionar las rutas de acciones de canciones
if (isset($_GET['action'])) {
    switch ($action) {
        // Obtener una canción por ID
        case 'agregarCancion':
            $cancionController->agregarCancion();
            exit();
        case 'obtenerCancionPorId':
            $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID de la canción");
            $cancionController->obtenerCancionPorId($id);
            break;
        
        // Actualizar una canción
        case 'actualizarCancion':
            $cancionController->actualizarCancion(); // Este método maneja la lógica de actualización
            break;
    
        // Eliminar una canción
        case 'eliminarCancion':
            $idCancion = isset($_GET['idCancion']) ? $_GET['idCancion'] : die("Falta el ID de la canción");
            $idLista = isset($_GET['idLista']) ? $_GET['idLista'] : die("Falta el ID de la lista");
            $cancionListaController->eliminarCancionDeLista($idCancion, $idLista);
            break;
    }

}
?>
