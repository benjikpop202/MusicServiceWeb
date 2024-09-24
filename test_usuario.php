<?php
header("Content-Type: application/json; charset=UTF-8");

// Mensaje de depuración inicial
echo json_encode(["message" => "Archivo test_usuario.php cargado."]);

// Incluir el modelo
require_once('./Model/DatabaseModel.php');

// Mensaje de depuración después de incluir el modelo
echo json_encode(["message" => "Modelo UserModel.php incluido."]);

// Incluir el controlador
require_once('./controllers/UserController.php');

// Mensaje de depuración después de incluir el controlador
echo json_encode(["message" => "Controlador UsuarioController.php incluido."]);

// Instanciar el modelo y el controlador
$database = new Database();
$db = $database->getDb();
$controller = new UsuarioController($db);

// Mensaje de depuración después de instanciar el modelo y el controlador
echo json_encode(["message" => "Base de datos y controlador instanciados."]);

// Obtener el método de solicitud
$method = $_SERVER['REQUEST_METHOD'];
echo json_encode(["message" => "Método de solicitud: $method"]);

// Procesar la solicitud en función del método
switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode(["message" => "Datos POST recibidos: " . json_encode($data)]);
        if (isset($data['action']) && $data['action'] == 'create') {
            $controller->registrarse();
        } elseif (isset($data['action']) && $data['action'] == 'update') {
            $controller->actualizarUsuario();
        }
        break;
    case 'GET':
        echo json_encode(["message" => "Solicitando todos los usuarios."]);
        $controller->obtenerUsuarios();
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode(["message" => "Datos DELETE recibidos: " . json_encode($data)]);
        if (isset($data['id'])) {
            $controller->eliminarUsuario($data['id']);
        }
        break;
    default:
        echo json_encode(["message" => "Método no soportado"]);
        break;
}
?>



