<?php
//require_once(SERVERPATH.'\libs\Smarty.class.php');
require_once('libs\Smarty.class.php');
require_once 'controllers/ListasController.php';
include_once('./FunctionController/funcionalidadesUser.php'); // Incluye funcionalidadesUser
include_once('./FunctionController/funcionalidadesLista.php');

// Configuración de Smarty
$smarty = new Smarty\Smarty;

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Limpiar la caché y los archivos compilados de Smarty
$smarty->clearAllCache();  // Limpiar la caché de todas las plantillas
$smarty->clearCompiledTemplate();  // Limpiar las plantillas compiladas

// Configuración de la base de datos
$database = new Database();
$db = $database->getDb();

// Prueba la instalación de Smarty para asegurarte de que todo esté configurado correctamente
//$smarty->testInstall();

$request = $_SERVER['REQUEST_URI'];

if (preg_match('/^\/home\/(\d+)$/', $request, $matches)) {
    $userId = $matches[1];

    // Obtener los datos del usuario desde la base de datos
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener todas las listas del usuario
    $queryListas = "SELECT * FROM listas WHERE usuario_id = :id";
    $stmtListas = $db->prepare($queryListas);
    $stmtListas->bindParam(':id', $userId);
    $stmtListas->execute();
    $listas = $stmtListas->fetchAll(PDO::FETCH_ASSOC);

    // Pasar los datos del usuario a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->assign('listas', $listas);
    $smarty->display('templates/principal.tpl');
    exit();
}
if (preg_match('/^\/home\/(\d+)\/cuenta$/', $request, $matches)) {
    $userId = $matches[1];

    // Obtener los datos del usuario desde la base de datos
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Pasar los datos del usuario a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->display('templates/cuenta.tpl');
    exit();
}
// Gestión de las rutas
switch ($request) {
    case '/home/:id':
        $smarty->display('templates/principal.tpl');
        break;

    case '/':
        $smarty->display('templates/sesion.tpl');
        break;
    case '/cuenta':
        $smarty->display('templates/cuenta.tpl'); 
        break;
    case '/register':
        $smarty->display('templates/registrarse.tpl');
        break;

    // Redirigir las acciones del usuario a funcionalidadesUser.php
    case (preg_match('/^\/user\//', $request) ? true : false):
        include_once(__DIR__ . '/functionController/funcionalidadesUser.php');
        break;
     // Redirigir las acciones relacionadas con listas a funcionalidadesLista.php
     case (preg_match('/^\/listas\//', $request) ? true : false):
        include_once(__DIR__ . '/FunctionController/funcionalidadesLista.php');
        break;     

    default:
        http_response_code(404);
        echo "Página no encontrada.";
        break;
}