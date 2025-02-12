<?php
include_once(__DIR__ . '/../Model/ListasModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); 
include_once(__DIR__ . '/../controllers/ListasController.php'); 
include_once(__DIR__ . '/../controllers/CancionesController.php');
include_once(__DIR__ . '/../controllers/CancionListaController.php');

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar controladores
$listaController = new ListaController($db);
$cancionListaController = new CancionListaController($db);

// Obtener la acción desde la URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Procesar la acción
if ($action) {
    switch ($action) {
        case 'obtenerListasPorUsuario':
          //  $listaController->obtenerListasUser();
            exit();
        case 'crearLista':
            $listaController->crearLista();
            exit();
        case 'crearCancion':
            $cancionListaController->agregarCancionALista();
            exit();
        case 'obtenerCanciones':
            if (!isset($_GET['lista_id'])) {
                die("Falta el ID de la lista");
            }
            $lista_id = $_GET['lista_id'];
           // $cancionListaController->obtenerCancionesPorLista($lista_id);
            exit();
        case 'obtenerListaPorId':
            if (!isset($_GET['id'])) {
                die("Falta el ID");
            }
            $id = $_GET['id'];
            $listaController->obtenerListaPorId($id);
            exit();
        case 'actualizarLista':
            $listaController->actualizarLista();
            exit();
        case 'eliminarLista':
            if (!isset($_GET['id'])) {
                die("Falta el ID");
            }
            $id = $_GET['id'];
            $listaController->eliminarLista($id);
            exit();
        default:
            die("Acción no reconocida");
    }
}
?>

