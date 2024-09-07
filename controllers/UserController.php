<?php
include_once('../Model/UserModel.php');

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
            $this->usuario->name = $_POST['name'];
            $this->usuario->gmail = $_POST['gmail'];
            $this->usuario->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->usuario->status = $_POST['status'];

            if ($this->usuario->crearUsuario()) {
                echo "Usuario registrado con éxito.";
            } else {
                echo "Error al registrar el usuario.";
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
