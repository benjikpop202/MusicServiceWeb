<?php
require_once('libs/Smarty.class.php');
require_once 'controllers/ListasController.php';
include_once('./FunctionController/funcionalidadesUser.php');
include_once('./FunctionController/funcionalidadesLista.php');

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

// Ruta para la página principal del usuario
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

    // Pasar los datos del usuario y las listas a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->assign('listas', $listas);
    $smarty->display('principal.tpl');
    exit();
}

// Ruta para la cuenta del usuario
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
    $smarty->display('cuenta.tpl');
    exit();
}

// Ruta para mostrar una lista específica
if (preg_match('/^\/home\/(\d+)\/lista\/(\d+)$/', $request, $matches)) {
    $userId = $matches[1];
    $listaId = $matches[2];

    // Obtener los datos de la lista desde la base de datos
    $query = "SELECT * FROM listas WHERE id = :listaId AND usuario_id = :userId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':listaId', $listaId);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $lista = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($lista) {
        // Pasar los datos de la lista a la plantilla Smarty
        $smarty->assign('lista', $lista);
        $smarty->display('lista.tpl');
    } else {
        http_response_code(404);
        echo "Lista no encontrada.";
    }
    exit();
}

// Gestión de las rutas restantes
switch ($request) {
    case '/':
        $smarty->display('sesion.tpl');
        break;
    case '/cuenta':
        $smarty->display('cuenta.tpl');
        break;
    case '/register':
        $smarty->display('registrarse.tpl');
        break;
    // Redirigir las acciones del usuario a funcionalidadesUser.php
    case (preg_match('/^\/user\//', $request) ? true : false):
        include_once(__DIR__ . '/FunctionController/funcionalidadesUser.php');
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
