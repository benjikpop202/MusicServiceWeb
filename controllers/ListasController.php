<?php

use Smarty\Smarty;

include_once(__DIR__ . '/../Model/ListasModel.php');

class ListaController {
    private $smarty = null;
    private $db;
    private $lista;

    public function __construct($db) {
        $this->db = $db;
        $this->lista = new Listas($db);
        $this->smarty = new Smarty();
    }

    // Método para crear una nueva lista
    public function crearLista() {
        header('Content-Type: application/json'); // Especificar JSON en la respuesta
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->lista->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->lista->usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : '';
    
            // Verificar que se haya completado el nombre y el ID del usuario
            if (!empty($this->lista->nombre) && !empty($this->lista->usuario_id)) {
                
                // Verificar si ya existe una lista con el mismo nombre para el mismo usuario
                $query = "SELECT COUNT(*) FROM listas WHERE nombre = :nombre AND usuario_id = :usuario_id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':nombre', $this->lista->nombre);
                $stmt->bindParam(':usuario_id', $this->lista->usuario_id);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                // Si existe una lista con el mismo nombre, retornar un mensaje de error
                if ($count > 0) {
                    echo json_encode(["success" => false, "message" => "Ya existe una lista con este nombre para el usuario."]);
                    http_response_code(400); // Código de error para validación de duplicados
                    exit();
                }

                // Si la lista no existe, crear la nueva lista
                if ($this->lista->crearLista()) {
                    echo json_encode(["success" => true, "message" => "Lista creada con éxito."]);
                    exit();
                } else {
                    echo json_encode(["success" => false, "message" => "Error al crear la lista."]);
                    http_response_code(500); // Código de error en caso de fallo
                    exit();
                }
            } else {
                echo json_encode(["success" => false, "message" => "Por favor, rellena todos los campos."]);
                http_response_code(400); // Código de error si faltan datos
                exit();
            }
        }
    }

    // Método para obtener todas las listas
    public function obtenerListasUser() {
    header("Content-Type: application/json");

    $stmt = $this->lista->obtenerListasUser();
    $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$listas) {
        echo json_encode(["error" => "No se encontraron listas"]);
        exit;
    }

    // Asignar listas a Smarty
    $this->smarty->assign('listas', $listas);
    
    // Convertir el template a JSON y enviarlo
    echo json_encode($this->smarty->fetch('../templates/principal.tpl'));
    exit;
    }

    // Método para obtener una lista por su ID
    public function obtenerListaPorId($id) {
        $this->lista->id = $id;
        $this->lista->obtenerListaPorId();

        $lista = [
            'id' => $this->lista->id,
            'nombre' => $this->lista->nombre,
            'es_publica' => $this->lista->es_publica,
            'usuario_id' => $this->lista->usuario_id
        ];

        echo json_encode($lista);
    }

    // Método para actualizar una lista
    public function actualizarLista() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $this->lista->id = $_POST['id'];
                $this->lista->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                $this->lista->es_publica = isset($_POST['es_publica']) ? (bool)$_POST['es_publica'] : false;
                $this->lista->usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : '';

                if ($this->lista->actualizarLista()) {
                    echo "Lista actualizada con éxito.";
                } else {
                    echo "Error al actualizar la lista.";
                }
            } else {
                echo "Falta el ID de la lista.";
            }
        }
    }

    // Método para eliminar una lista
    public function eliminarLista($id) {
        $this->lista->id = $id;

        if ($this->lista->eliminarLista()) {
            echo "Lista eliminada con éxito.";
        } else {
            echo "Error al eliminar la lista.";
        }
    }
}
?>

