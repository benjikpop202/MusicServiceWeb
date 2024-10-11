<?php
include_once(__DIR__ . '/../Model/ListasModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); // Asegúrate de incluir la conexión a la base de datos
include_once(__DIR__ . '/../controllers/ListasController.php'); // Incluye el controlador de listas

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de listas
$listaController = new ListaController($db);

// Obtener la acción desde la URL o establecerla por defecto
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Gestionar las rutas de acciones de listas (crear, obtener, eliminar, actualizar)
switch ($action) {
    case 'crearLista':
        $listaController->crearLista();
        break;

    case 'obtenerListas':
        $listaController->obtenerListas();
        break;

    case 'obtenerListaPorId':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $listaController->obtenerListaPorId($id);
        break;

    case 'actualizarLista':
        $listaController->actualizarLista();
        break;

    case 'eliminarLista':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $listaController->eliminarLista($id);
        break;

    default:
        echo "Acción no válida.";
        break;
}
?>
