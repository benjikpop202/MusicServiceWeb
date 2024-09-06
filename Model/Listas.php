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
        $query = "INSERT INTO " . $this->table . " (nombre, es_publica, usuario_id) 
                  VALUES (:nombre, :es_publica, :usuario_id)";

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->es_publica = htmlspecialchars(strip_tags($this->es_publica));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':es_publica', $this->es_publica);
        $stmt->bindParam(':usuario_id', $this->usuario_id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function obtenerListas() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function obtenerListaPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";

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
        $this->es_publica = htmlspecialchars(strip_tags($this->es_publica));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->nombre);
        $stmt->bindParam(':gmail', $this->es_publica);
        $stmt->bindParam(':password', $this->usuario_id);
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