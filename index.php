<?php
//require_once(SERVERPATH.'\libs\Smarty.class.php');
require_once('libs\Smarty.class.php');
include_once('./FunctionController/funcionalidadesUser.php'); // Incluye funcionalidadesUser

// Configuración de Smarty
$smarty = new Smarty\Smarty;

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

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

    // Pasar los datos del usuario a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->display('templates/principal.tpl');
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

    case '/register':
        $smarty->display('templates/registrarse.tpl');
        break;

    // Redirigir las acciones del usuario a funcionalidadesUser.php
    case (preg_match('/^\/user\//', $request) ? true : false):
        include_once(__DIR__ . '/functionController/funcionalidadesUser.php');
        break;

    default:
        http_response_code(404);
        echo "Página no encontrada.";
        break;
}

