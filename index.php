<?php
//define('SERVERPATH', $_SERVER['DOCUMENT_ROOT']);
// Incluye el archivo principal de Smarty. Ajusta la ruta según sea necesario.
//require_once(SERVERPATH.'\libs\Smarty.class.php');
/*require_once('libs\Smarty.class.php');
// Configuración de la base de datos

$smarty = new Smarty\Smarty;


// Configura los directorios de Smarty. Usa __DIR__ para obtener la ruta absoluta
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Prueba la instalación de Smarty para asegurarte de que todo esté configurado correctamente
//$smarty->testInstall();
$mensaje = "Hola, Smarty!";
$smarty->assign('variable', $mensaje);

// Muestra la plantilla
$smarty->display('templates.tpl');*/

include_once './Model/DatabaseModel.php';
include_once './controllers/UserController.php';
require 'vendor/autoload.php';
//cargar las variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
        echo "Acción no reconocida.";
}

?>