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
        // Eliminar la canción de la lista específica
        $query = "DELETE FROM " . $this->table . " WHERE lista_id = :lista_id AND cancion_id = :cancion_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':lista_id', $listaID, PDO::PARAM_INT);
        $stmt->bindParam(':cancion_id', $cancionID, PDO::PARAM_INT);
    
        // Verificar si la eliminación fue exitosa antes de continuar
        if (!$stmt->execute()) {
            return false; // Si no se eliminó de la lista, retornamos false
        }
            $sqlEliminar = "DELETE FROM Canciones WHERE id = :cancionId";
            $stmtEliminar = $this->db->prepare($sqlEliminar);
            $stmtEliminar->bindParam(':cancionId', $cancionID, PDO::PARAM_INT);
            $stmtEliminar->execute();
        
    
        return true; // Éxito
    }
    

}
