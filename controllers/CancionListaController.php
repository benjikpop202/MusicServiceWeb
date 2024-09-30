<?php
include_once(__DIR__ . '/../Model/CancionListaModel.php');

class CancionListaController {
    private $db;
    private $cancionLista;

    public function __construct($db) {
        $this->db = $db;
        $this->cancionLista = new CancionLista($db);  // Instancia del modelo CancionLista
    }

    // Método para agregar una canción a una lista
    public function agregarCancionALista() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si lista_id y cancion_id están presentes
            if (isset($_POST['lista_id']) && isset($_POST['cancion_id'])) {
                $this->cancionLista->lista_id = $_POST['lista_id'];
                $this->cancionLista->cancion_id = $_POST['cancion_id'];

                // Intentar agregar la canción a la lista
                if ($this->cancionLista->agregarCancionALista()) {
                    echo "Canción agregada a la lista con éxito.";
                } else {
                    echo "Error al agregar la canción a la lista.";
                }
            } else {
                echo "Falta el ID de la lista o el ID de la canción.";
            }
        }
    }

    // Método para actualizar una canción en una lista (requiere eliminar y volver a agregar)
    public function actualizarCancionEnLista() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si lista_id y cancion_id están presentes
            if (isset($_POST['lista_id']) && isset($_POST['cancion_id']) && isset($_POST['nuevo_cancion_id'])) {
                $this->cancionLista->lista_id = $_POST['lista_id'];
                $this->cancionLista->cancion_id = $_POST['cancion_id'];

                // Primero eliminamos la canción actual
                if ($this->cancionLista->eliminarCancionDeLista()) {
                    // Luego agregamos la nueva canción
                    $this->cancionLista->cancion_id = $_POST['nuevo_cancion_id'];
                    if ($this->cancionLista->agregarCancionALista()) {
                        echo "Canción actualizada en la lista con éxito.";
                    } else {
                        echo "Error al actualizar la canción en la lista.";
                    }
                } else {
                    echo "Error al eliminar la canción antigua de la lista.";
                }
            } else {
                echo "Faltan el ID de la lista, la canción actual o la nueva canción.";
            }
        }
    }

    // Método para eliminar una canción de una lista
    public function eliminarCancionDeLista() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si lista_id y cancion_id están presentes
            if (isset($_POST['lista_id']) && isset($_POST['cancion_id'])) {
                $this->cancionLista->lista_id = $_POST['lista_id'];
                $this->cancionLista->cancion_id = $_POST['cancion_id'];

                // Intentar eliminar la canción de la lista
                if ($this->cancionLista->eliminarCancionDeLista()) {
                    echo "Canción eliminada de la lista con éxito.";
                } else {
                    echo "Error al eliminar la canción de la lista.";
                }
            } else {
                echo "Falta el ID de la lista o el ID de la canción.";
            }
        }
    }
}
