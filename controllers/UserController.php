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
    

    // Método para obtener todos los usuarios
    public function obtenerUsuarios() {
        $stmt = $this->usuario->obtenerUsuarios();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($usuarios);
    }

    // Método para eliminar un usuario
    public function eliminarUsuario($id) {
        $this->usuario->id = $id;

        if ($this->usuario->eliminarUsuario()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    // Método para actualizar un usuario
    public function actualizarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Asegurarse de que el ID del usuario esté presente
            if (isset($_POST['id'])) {
                $this->usuario->id = $_POST['id'];
                $this->usuario->name = $_POST['name'];
                $this->usuario->gmail = $_POST['gmail'];
                
                // Actualizar la contraseña si se ha proporcionado una nueva
                if (!empty($_POST['password'])) {
                    $this->usuario->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                }
                
                $this->usuario->status = $_POST['status'];

                // Llamar al método actualizar del modelo
                if ($this->usuario->actualizarUsuario()) {
                    echo "Usuario actualizado con éxito.";
                } else {
                    echo "Error al actualizar el usuario.";
                }
            } else {
                echo "Falta el ID del usuario.";
            }
        }
    }
}
