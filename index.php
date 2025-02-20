<?php
require_once('libs/Smarty.class.php');
require_once 'controllers/ListasController.php';
include_once('./FunctionController/funcionalidadesUser.php');
include_once('./FunctionController/funcionalidadesLista.php');
include_once('./FunctionController/funcionalidadesCanciones.php');

// Configuración de Smarty
$smarty = new Smarty\Smarty;

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Limpiar la caché y los archivos compilados de Smarty
$smarty->clearAllCache();
$smarty->clearCompiledTemplate();

// Configuración de la base de datos
$database = new Database();
$db = $database->getDb();

$request = $_SERVER['REQUEST_URI'];

require_once('Routes/gestionRutas.php');
require_once('Routes/rutasPregMatch.php');

