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
$mensaje = "Hola, Smarty!";
$smarty->assign('variable', $mensaje);

// Muestra la plantilla
$smarty->display('templates.tpl');

?>