<?php

class CancionLista {
    private $db;
    private $table = "CancionLista";


    public function __construct($db) {
        $this->db = $db;
    }

    // Agregar una canción a una lista
    public function agregarCancionALista($cancionID, $listaID) {
        $query = "INSERT INTO " . $this->table . " (lista_id, cancion_id) 
                  VALUES (:lista_id, :cancion_id)";

        $stmt = $this->db->prepare($query);


        // Enlazar parámetros
        $stmt->bindParam(':lista_id', $listaID);
        $stmt->bindParam(':cancion_id', $cancionID);

        // Ejecutar consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una canción de una lista
    public function eliminarCancionDeLista($cancionID, $listaID) {
        $query = "DELETE FROM " . $this->table . " WHERE lista_id = :lista_id AND cancion_id = :cancion_id";

        $stmt = $this->db->prepare($query);
        // Enlazar parámetros
        $stmt->bindParam(':lista_id', $listaID);
        $stmt->bindParam(':cancion_id', $cancionID);

        // Ejecutar consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
