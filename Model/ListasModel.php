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
                  VALUES (:nombre, :usuario_id)";

        $stmt = $this->db->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->usuario_id = htmlspecialchars(strip_tags($this->usuario_id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':usuario_id', $this->usuario_id);

        return $stmt->execute();
    }

    public function obtenerListasPorUsuario($usuario_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE usuario_id = :usuario_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    public function obtenerListaPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->es_publica = $row['es_publica'];
            $this->usuario_id = $row['usuario_id'];
        }
    }

    public function actualizarLista($id, $datos) {
        $campos = [];
        $valores = [];
    
        foreach ($datos as $campo => $valor) {
            $campos[] = "$campo = ?";
            $valores[] = $valor;
        }
    
        if (empty($campos)) {
            return false; // No hay datos para actualizar
        }
    
        $sql = "UPDATE listas SET " . implode(", ", $campos) . " WHERE id = ?";
        $valores[] = $id;
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($valores);
    }

    public function eliminarLista($id) {
        $query = "DELETE FROM listas WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    }
    
    