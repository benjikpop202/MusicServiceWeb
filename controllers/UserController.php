<?php
include_once(__DIR__ . '/../Model/UserModel.php');

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct($db) {
        $this->db = $db;
        $this->usuario = new Usuario($db);
    }

    // Método para registrar un nuevo usuario
    public function registrarse() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar que los campos existan en el POST antes de asignarlos
            $this->usuario->name = isset($_POST['name']) ? $_POST['name'] : '';
            $this->usuario->gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
            $this->usuario->password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : '';
            $this->usuario->status = isset($_POST['status']) ? $_POST['status'] : '';
    
            // Verifica que todos los campos requeridos tengan valores
            if (!empty($this->usuario->name) && !empty($this->usuario->gmail) && !empty($this->usuario->password) && !empty($this->usuario->status)) {
                if ($this->usuario->crearUsuario()) {
                    echo "Usuario registrado con éxito.";
                } else {
                    echo "Error al registrar el usuario.";
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }
    
    public function iniciarSesion()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar que los campos existan en el POST antes de asignarlos
        $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Verifica que los campos requeridos no estén vacíos
        if (!empty($gmail) && !empty($password)) {
            // Llama al modelo para comprobar las credenciales
            $usuario = $this->usuario->iniciarSesion($gmail, $password);

            if ($usuario) {
                // Iniciar sesión si las credenciales son correctas
                session_start();
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['name'];
                $_SESSION['user_status'] = $usuario['status'];

                echo "Inicio de sesión exitoso. Bienvenido, " . $usuario['name'] . ".";
                // Puedes redirigir al usuario a otra página si es necesario
                header('Location: /home/' . $usuario['id']);
                exit();
            } else {
                echo "Correo electrónico o contraseña incorrectos.";
            }
        } else {
            echo "Por favor, rellena todos los campos obligatorios.";
        }
    }
}
    // Método para obtener todos los usuarios
    public function obtenerUsuarios() {
        $stmt = $this->usuario->obtenerUsuarios();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($usuarios);
    }

    // Método para eliminar un usuario
    public function eliminarUsuario($id) {
     header('Content-Type: application/json; charset=utf-8');
        try {
        $resultado = $this->usuario->eliminarUsuario($id);
        //$this->usuario->id = $id;
        if ($resultado) {
            echo json_encode(["mensaje" => "Usuario eliminado correctamente"]);
        } else {
            echo json_encode(["mensaje" => "no se pudo eliminar el usuario"]);
        }
        } catch (Exception $e) {
            echo json_encode(["error" => "Error al eliminar el usuario: " . $e->getMessage()]);
        }
    }

    // Método para actualizar solo la contraseña del usuario
    public function actualizarUsuario() {
        header("Content-Type: application/json");
    
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? null;
        $status = $_POST['status'] ?? null;
    
        if (!$id) {
            echo json_encode(["error" => "ID de usuario requerido"]);
            exit;
        }
    
        $datos = [];
        if ($name) $datos["name"] = $name;
        if ($status) $datos["status"] = $status;
    
        if (empty($datos)) {
            echo json_encode(["error" => "No hay datos para actualizar"]);
            exit;
        }
    
        try {
            $resultado = $this->usuario->actualizarUsuario($id, $datos);
    
            if ($resultado) {
                echo json_encode(["mensaje" => "Usuario actualizado correctamente"]);
            } else {
                echo json_encode(["error" => "No se pudo actualizar el usuario"]);
            }
        } catch (Exception $e) {
            echo json_encode(["error" => "Error en la actualización: " . $e->getMessage()]);
        }
    }
}
?>