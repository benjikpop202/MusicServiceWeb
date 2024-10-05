<?php
//define('SERVERPATH', $_SERVER['DOCUMENT_ROOT']);
// Incluye el archivo principal de Smarty. Ajusta la ruta según sea necesario.
//require_once(SERVERPATH.'\libs\Smarty.class.php');
require_once('libs\Smarty.class.php');
// Configuración de la base de datos

$smarty = new Smarty\Smarty;

// Configura los directorios de Smarty. Usa __DIR__ para obtener la ruta absoluta
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Prueba la instalación de Smarty para asegurarte de que todo esté configurado correctamente
//$smarty->testInstall();
$request = $_SERVER['REQUEST_URI'];

switch ($request){
    case '/home':
       $smarty->display('templates/principal.tpl');
        break;
    case '/login':
        $smarty->display('templates/sesion.tpl');
        break;
    case '/register':
        $smarty->display('templates/registrarse.tpl');
        break;
    default:
        http_response_code(404);
        break;
}

include_once './Model/DatabaseModel.php';
include_once './controllers/UserController.php';

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();


// Instanciar el controlador de usuarios
$usuarioController = new UsuarioController($db);

// Gestionar las rutas simples
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'registrarse':
        $usuarioController->registrarse();
        break;
    case 'obtenerUsuarios':
        $usuarioController->obtenerUsuarios();
        break;
    case 'eliminarUsuario':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $usuarioController->eliminarUsuario($id);
        break;
    case 'actualizarUsuario':
        $usuarioController->actualizarUsuario();
        break;
    default:
       // echo "Acción no reconocida.";
}

?>









