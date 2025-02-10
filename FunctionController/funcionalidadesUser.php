<?php
include_once(__DIR__ . '/../Model/UserModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); // Asegúrate de incluir la conexión a la base de datos
include_once(__DIR__ . '/../controllers/UserController.php'); // Incluye el controlador de usuarios
include_once(__DIR__ . '/../controllers/ListasController.php'); // Controlador de listas


// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de usuarios y listas
$usuarioController = new UsuarioController($db);
$listaController = new ListaController($db);

// Obtener la acción desde la URL o establecerla por defecto
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Verificar si la URL es '/register' y asignar la acción 'registrarse'
if ($_SERVER['REQUEST_URI'] == '/register') {
    $action = 'registrarse';
}


// Gestionar las rutas de acciones de usuario (registrarse, obtener, eliminar, actualizar)
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'registrarse':
            $usuarioController->registrarse();
            exit();
        case 'iniciarSesion':
            $usuarioController->iniciarSesion();
            exit();
        case 'obtenerUsuarios':
            $usuarioController->obtenerUsuarios();
            exit();
        case 'eliminarUsuario':
            $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
            $usuarioController->eliminarUsuario($id);
            exit();
        case 'actualizarUsuario':
            $usuarioController->actualizarUsuario();
            exit();
    }
}
?>

