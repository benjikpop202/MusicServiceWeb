<?php
include_once(__DIR__ . '/../Model/CancionModel.php');
include_once(__DIR__ . '/../controllers/CancionListaController.php');

class CancionesController {
    private $db;
    private $cancion;
    private $cancionLista;

    public function __construct($db) {
        $this->db = $db;
        $this->cancion = new Canciones($db);
        $this->cancionLista = new CancionListaController($db);
    }



    public function crearCancion() {
        header('Content-Type: application/json');
    
        // Verificar el método de solicitud
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $lista_id = isset($_POST['lista_id']) ? $_POST['lista_id'] : '';
            $this->cancion->nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
            $this->cancion->artista = isset($_POST['artista']) ? trim($_POST['artista']) : '';
            $this->cancion->genero = isset($_POST['genero']) ? trim($_POST['genero']) : '';
    
            // Validar que todos los campos estén presentes
            if (empty($this->cancion->nombre) || empty($this->cancion->artista) || empty($this->cancion->genero)) {
                echo json_encode(["error" => "Todos los campos son obligatorios."]);
                return;
            }
    
            // Validar que el ID de la lista no esté vacío
            if (empty($lista_id)) {
                echo json_encode(["error" => "El ID de la lista es obligatorio."]);
                return;
            }
    
            // Crear la canción
            $newCancion = $this->cancion->crearCanciones();
            if ($newCancion === false) {
                echo json_encode(["error" => "Error al crear la canción en la base de datos."]);
                return;
            }
    
            // Agregar la canción a la lista
            $agregada = $this->cancionLista->agregarCancionALista($newCancion, $lista_id);
            if (!$agregada) {
                echo json_encode(["error" => "Error al agregar la canción a la lista."]);
                return;
            }
    
            // Respuesta exitosa
            echo json_encode(["success" => "Canción creada y agregada a la lista con éxito."]);
        } else {
            echo json_encode(["error" => "Método no permitido."]);
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
                        echo json_encode(["mensaje" => "Canción actualizada con éxito."]);
                    } else {
                        echo json_encode(["error" => "Error al actualizar la canción."]);
                    }
                } else {
                    echo json_encode(["error" => "Por favor, rellena todos los campos obligatorios."]);
                }
            } else {
                echo "Falta el ID de la canción.";
            }
        }
    }

}
?>   

