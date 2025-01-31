<?php
include_once(__DIR__ . '/../Model/ListasModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); // Asegúrate de incluir la conexión a la base de datos
include_once(__DIR__ . '/../controllers/ListasController.php'); // Incluye el controlador de listas
include_once(__DIR__ . '/../controllers/CancionesController.php'); // Incluye el controlador de CancionLista

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de listas y cancionLista
$listaController = new ListaController($db);
//$cancionListaController = new CancionListaController($db); // Instancia del controlador de CancionLista

// Obtener la acción desde la URL o establecerla por defecto
$action = isset($_GET['action']) ? $_GET['action'] : '';




// Gestionar las rutas de acciones de listas y canciones
switch ($action) {
    case 'obtenerListasUser':
        $listaController->obtenerListasUser();
        break;
    case 'crearLista':
        $listaController->crearLista();
        break;
    // Crear una canción
    case 'crearCancion':
        $cancionListaController->agregarCancionALista(); // Añadir canción a una lista
        break;

    // Obtener todas las canciones de una lista
    case 'obtenerCanciones':
        $lista_id = isset($_GET['lista_id']) ? $_GET['lista_id'] : die("Falta el ID de la lista");
       // $cancionListaController->obtenerCancionesPorLista($lista_id);
        break;

    // Obtener una lista por ID
    case 'obtenerListaPorId':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $listaController->obtenerListaPorId($id);
        break;

    // Actualizar una lista
    case 'actualizarLista':
        $listaController->actualizarLista(); // Este método debe estar definido en ListasController
        break;

    // Eliminar una lista
    case 'eliminarLista':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $listaController->eliminarLista($id);
        break;

    
}
?>

