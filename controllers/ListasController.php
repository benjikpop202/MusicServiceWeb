<?php

use Smarty\Smarty;

include_once(__DIR__ . '/../Model/ListasModel.php');

class ListaController {
    private $smarty;
    private $db;
    private $lista;

    public function __construct($db) {
        $this->db = $db;
        $this->lista = new Listas($db);
        $this->smarty = new Smarty();
    }

    // Método para crear una nueva lista
    public function crearLista() {
        header('Content-Type: application/json');
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->lista->nombre = $_POST['nombre'] ?? '';
            $this->lista->usuario_id = $_POST['usuario_id'] ?? '';
    
            if (!empty($this->lista->nombre) && !empty($this->lista->usuario_id)) {
                $query = "SELECT COUNT(*) FROM listas WHERE nombre = :nombre AND usuario_id = :usuario_id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':nombre', $this->lista->nombre);
                $stmt->bindParam(':usuario_id', $this->lista->usuario_id);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    echo json_encode(["success" => false, "message" => "Ya existe una lista con este nombre para el usuario."]);
                    http_response_code(400);
                    exit();
                }

                if ($this->lista->crearLista()) {
                    echo json_encode(["success" => true, "message" => "Lista creada con éxito."]);
                    exit();
                } else {
                    echo json_encode(["success" => false, "message" => "Error al crear la lista."]);
                    http_response_code(500);
                    exit();
                }
            } else {
                echo json_encode(["success" => false, "message" => "Por favor, rellena todos los campos."]);
                http_response_code(400);
                exit();
            }
        }
    }

    // Método para obtener todas las listas de un usuario
    public function obtenerListasPorUsuario($usuario_id) {
        $stmt = $this->lista->obtenerListasPorUsuario($usuario_id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener una lista por su ID
    public function obtenerListaPorId($id) {
        $this->lista->id = $id;
        $this->lista->obtenerListaPorId();

        echo json_encode([
            'id' => $this->lista->id,
            'nombre' => $this->lista->nombre,
            'es_publica' => $this->lista->es_publica,
            'usuario_id' => $this->lista->usuario_id
        ]);
    }

    // Método para actualizar una lista
    public function actualizarLista() {
    header("Content-Type: application/json");

    // Obtener los datos enviados por POST
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $es_publica = $_POST['es_publica'] ?? null;

    // Validar que el ID exista
    if (!$id) {
        echo json_encode(["error" => "ID de la lista requerido"]);
        exit;
    }

    // Preparar los datos para actualizar
    $datos = [];
    if ($nombre) $datos["nombre"] = $nombre;
    if (!is_null($es_publica)) $datos["es_publica"] = $es_publica; 

    // Si no hay datos para actualizar
    if (empty($datos)) {
        echo json_encode(["error" => "No hay datos para actualizar"]);
        exit;
    }

    try {
        // Llamar al modelo para actualizar la lista
        $resultado = $this->lista->actualizarLista($id, $datos);

        if ($resultado) {
            echo json_encode(["mensaje" => "Lista actualizada correctamente"]);
        } else {
            echo json_encode(["error" => "No se pudo actualizar la lista"]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => "Error en la actualización: " . $e->getMessage()]);
    }
}

  
    
    // Método para eliminar una lista
public function eliminarLista($id) {
    header('Content-Type: application/json; charset=utf-8');

    try {
        $resultado = $this->lista->eliminarLista($id);

        if ($resultado) {
            echo json_encode(["mensaje" => "Lista eliminada correctamente"]);
        } else {
            echo json_encode(["mensaje" => "No se pudo eliminar la lista"]);
        }
    } catch (Exception $e) {
        echo json_encode(["error" => "Error al eliminar la lista: " . $e->getMessage()]);
    }
}
}