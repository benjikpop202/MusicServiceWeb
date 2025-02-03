<?php
class Listas {
    private $db;
    private $table = "Listas";

    public $id;
    public $nombre;
    public $es_publica;
    public $usuario_id;

    public function __construct($db) {
        $this->db = $db;
    }

    public function crearLista() {
        $query = "INSERT INTO " . $this->table . " (nombre, usuario_id) 
                  VALUES (:nombre,:usuario_id)";

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':usuario_id', $this->usuario_id);

        if ($stmt->execute()) {

           return true;
            
        }

        return false;
    }

    public function obtenerListasUser() {
        $query = "SELECT * FROM " . $this->table . " WHERE usuario_id = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $this->usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerListasPlataforma() {
        $query = "SELECT * FROM " . $this->table. "WHERE es_publica = :es_publica";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':es_publica', true);
        $stmt->execute();

        return $stmt;
    }

    public function obtenerListaPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->es_publica = $row['es_publica'];
            $this->usuario_id = $row['usuario_id'];
        }
    }

    public function actualizarLista() {
        $query = "UPDATE " . $this->table . " 
                  SET nombre = :nombre, es_publica = :es_publica, usuario_id = :usuario_id
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->es_publica = (bool)$this->es_publica;
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));
        $this->id = htmlspecialchars(strip_tags($this->id));
        
         // Enlazar parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':es_publica', $this->es_publica, PDO::PARAM_BOOL);
        $stmt->bindParam(':usuario_id', $this->usuario_id); 
        $stmt->bindParam(':id', $this->id);


        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function eliminarLista() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}