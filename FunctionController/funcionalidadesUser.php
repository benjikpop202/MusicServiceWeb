<?php
include_once(__DIR__ . '/../Model/UserModel.php');
include_once(__DIR__ . '/../Model/DatabaseModel.php'); // Asegúrate de incluir la conexión a la base de datos
include_once(__DIR__ . '/../Controllers/UserController.php'); // Incluye el controlador de usuarios

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de usuarios
$usuarioController = new UsuarioController($db);

// Obtener la acción desde la URL o establecerla por defecto
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Verificar si la URL es '/register' y asignar la acción 'registrarse'
if ($_SERVER['REQUEST_URI'] == '/register') {
    $action = 'registrarse';
}

// Gestionar las rutas de acciones de usuario (registrarse, obtener, eliminar, actualizar)
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

