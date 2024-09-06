<?php

class CancionLista {
    private $db;
    private $table = "CancionLista";

    public $lista_id;
    public $cancion_id;

    public function __construct($db) {
        $this->db = $db;
    }

    // Agregar una canción a una lista
    public function agregarCancionALista() {
        $query = "INSERT INTO " . $this->table . " (lista_id, cancion_id) 
                  VALUES (:lista_id, :cancion_id)";

        $stmt = $this->db->prepare($query);

        // Limpiar datos
        $this->lista_id = htmlspecialchars(strip_tags($this->lista_id));
        $this->cancion_id = htmlspecialchars(strip_tags($this->cancion_id));

        // Enlazar parámetros
        $stmt->bindParam(':lista_id', $this->lista_id);
        $stmt->bindParam(':cancion_id', $this->cancion_id);

        // Ejecutar consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una canción de una lista
    public function eliminarCancionDeLista() {
        $query = "DELETE FROM " . $this->table . " WHERE lista_id = :lista_id AND cancion_id = :cancion_id";

        $stmt = $this->db->prepare($query);

        // Limpiar datos
        $this->lista_id = htmlspecialchars(strip_tags($this->lista_id));
        $this->cancion_id = htmlspecialchars(strip_tags($this->cancion_id));

        // Enlazar parámetros
        $stmt->bindParam(':lista_id', $this->lista_id);
        $stmt->bindParam(':cancion_id', $this->cancion_id);

        // Ejecutar consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todas las canciones de una lista
    public function obtenerCancionesPorLista() {
        $query = "SELECT c.* FROM Canciones c
                  INNER JOIN " . $this->table . " cl ON c.id = cl.cancion_id
                  WHERE cl.lista_id = :lista_id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':lista_id', $this->lista_id);

        $stmt->execute();

        return $stmt;
    }
}
