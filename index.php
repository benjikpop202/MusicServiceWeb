<?php
//require_once(SERVERPATH.'\libs\Smarty.class.php');
require_once('libs\Smarty.class.php');
include_once(__DIR__ . '/functionController/funcionalidadesUser.php'); // Incluye funcionalidadesUser

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

// Gestión de las rutas
switch ($request) {
    case '/home':
       $smarty->display('templates/principal.tpl');
        break;

    case '/login':
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

