<?php
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
