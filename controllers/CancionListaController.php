<?php
include_once(__DIR__ . '/../Model/CancionListaModel.php');

class CancionListaController {
    private $db;
    private $cancionLista;

    public function __construct($db) {
        $this->db = $db;
        $this->cancionLista = new CancionLista($db);
    }

    // Método para agregar una canción a una lista
    public function agregarCancionALista($cancionId, $listaId) {
               try {
                $resultado = $this->cancionLista->agregarCancionALista($cancionId, $listaId);
                if ($resultado) {
                    echo json_encode(["mensaje" => "cancion agregada a la lista"]);;
                } else {
                    echo json_encode(["error" => "Error al agregar la canción a la lista."]);
                }
               } catch (Exception $e) {
                echo json_encode(["error" => "Error en la consulta : " . $e->getMessage()]);
               }
    }


    // Método para eliminar una canción de una lista
    public function eliminarCancionDeLista($cancionId, $listaId) {
              try {
                $resultado = $this->cancionLista->eliminarCancionDeLista($cancionId, $listaId);
                if ($resultado) {
                    echo json_encode(["Canción eliminada de la lista con éxito."]);
                } else {
                    echo json_encode(["Error al eliminar la canción de la lista."]);
                }
              } catch (Exception $e) {
                echo json_encode(["Error al eliminar la consulta de eliminar cancion:". $e->getMessage()]);
              }
    }

}
