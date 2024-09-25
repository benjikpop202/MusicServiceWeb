<?php
include_once(__DIR__ . '/../Model/ListasModel.php');

class ListaController {
    private $db;
    private $lista;

    public function __construct($db) {
        $this->db = $db;
        $this->lista = new Listas($db);
    }

    // Método para crear una nueva lista
    public function crearLista() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->lista->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->lista->es_publica = isset($_POST['es_publica']) ? $_POST['es_publica'] : '';
            $this->lista->usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : '';

            if (!empty($this->lista->nombre) && isset($this->lista->es_publica) && !empty($this->lista->usuario_id)) {
                if ($this->lista->crearLista()) {
                    echo "Lista creada con éxito.";
                } else {
                    echo "Error al crear la lista.";
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }

    // Método para obtener todas las listas
    public function obtenerListas() {
        $stmt = $this->lista->obtenerListas();
        $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($listas);
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
                $this->lista->es_publica = isset($_POST['es_publica']) ? $_POST['es_publica'] : '';
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
