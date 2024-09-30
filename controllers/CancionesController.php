<?php
include_once(__DIR__ . '/../Model/CancionModel.php');

class CancionesController {
    private $db;
    private $cancion;

    public function __construct($db) {
        $this->db = $db;
        $this->cancion = new Canciones($db);
    }

    // Método para crear una nueva canción
    public function crearCancion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar que los campos existan en el POST antes de asignarlos
            $this->cancion->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->cancion->artista = isset($_POST['artista']) ? $_POST['artista'] : '';
            $this->cancion->genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    
            // Verifica que todos los campos requeridos tengan valores
            if (!empty($this->cancion->nombre) && !empty($this->cancion->artista) && !empty($this->cancion->genero)) {
                if ($this->cancion->crearCanciones()) {
                    echo "Canción creada con éxito.";
                } else {
                    echo "Error al crear la canción.";
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }

    // Método para obtener todas las canciones
    public function obtenerCanciones() {
        $stmt = $this->cancion->obtenerCanciones();
        $canciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($canciones);
    }

    // Método para obtener una canción por ID
    public function obtenerCancionPorId($id) {
        $this->cancion->id = $id;

        $this->cancion->obtenerCancionesPorId();

        if (!empty($this->cancion->nombre)) {
            $cancion = [
                "id" => $this->cancion->id,
                "nombre" => $this->cancion->nombre,
                "artista" => $this->cancion->artista,
                "genero" => $this->cancion->genero
            ];
            echo json_encode($cancion);
        } else {
            echo json_encode(["message" => "Canción no encontrada."]);
        }
    }

    // Método para actualizar una canción
    public function actualizarCancion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si el ID de la canción está presente
            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $this->cancion->id = $_POST['id'];

                // Asignar los nuevos valores
                $this->cancion->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                $this->cancion->artista = isset($_POST['artista']) ? $_POST['artista'] : '';
                $this->cancion->genero = isset($_POST['genero']) ? $_POST['genero'] : '';

                // Verifica que todos los campos requeridos tengan valores
                if (!empty($this->cancion->nombre) && !empty($this->cancion->artista) && !empty($this->cancion->genero)) {
                    if ($this->cancion->actualizarCanciones()) {
                        echo "Canción actualizada con éxito.";
                    } else {
                        echo "Error al actualizar la canción.";
                    }
                } else {
                    echo "Por favor, rellena todos los campos obligatorios.";
                }
            } else {
                echo "Falta el ID de la canción.";
            }
        }
    }

    // Método para eliminar una canción
    public function eliminarCancion($id) {
        $this->cancion->id = $id;

        if ($this->cancion->eliminarCanciones()) {
            echo "Canción eliminada con éxito.";
        } else {
            echo "Error al eliminar la canción.";
        }
    }
}
?>
