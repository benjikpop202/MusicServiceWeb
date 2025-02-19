<?php
 class Canciones {
    private $db;
    private $table = "Canciones";

    public $id;
    public $nombre;
    public $artista;
    public $genero;
    

    public function __construct($db) {
        $this->db = $db;
    }

    public function agregarCancion($nombre, $artista, $genero, $lista_id) {
        // Verificar si la canción ya existe en la base de datos
        $sql = "SELECT id FROM canciones WHERE nombre = ? AND artista = ? AND genero = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $artista, $genero]);
        $cancion = $query->fetch();
    
        if ($cancion) {
            $cancion_id = $cancion['id']; // Usar el ID de la canción ya existente
        } else {
            // Insertar nueva canción
            $sql = "INSERT INTO canciones (nombre, artista, genero) VALUES (?, ?, ?)";
            $query = $this->db->prepare($sql);
            $query->execute([$nombre, $artista, $genero]);
            $cancion_id = $this->db->lastInsertId();
        }
    
        // Verificar si la canción ya está en la misma lista
        $sql = "SELECT * FROM cancionlista WHERE lista_id = ? AND cancion_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$lista_id, $cancion_id]);
        $cancion_en_lista = $query->fetch();
    
        if ($cancion_en_lista) {
            return ["error" => "La canción ya está en la lista."];
        }
    
        // Insertar la canción en la lista
        $sql = "INSERT INTO cancionlista (lista_id, cancion_id) VALUES (?, ?)";
        $query = $this->db->prepare($sql);
        $success = $query->execute([$lista_id, $cancion_id]);
    
        // Verificar si la inserción fue exitosa
        if (!$success) {
            return ["error" => "Error al agregar la canción a la lista."];
        }
    
        return ["success" => "Canción agregada exitosamente."];
    }
    
    
    // Obtener todos las canciones
    public function obtenerCanciones() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // obtener canciones por ID

    public function obtenerCancionesPorId() {
        $query = "SELECT * FROM canciones WHERE id = :id LIMIT 1"; // Solo necesitas un registro
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    
        // Asignar valores a las propiedades del objeto Cancion
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->nombre = $row['nombre'];
            $this->artista = $row['artista'];
            $this->genero = $row['genero'];
        }
    }
    

    // Actualizar una cancion
    public function actualizarCanciones() {
        $query = "UPDATE " . $this->table . " 
                  SET nombre = :nombre, artista = :artista, genero = :genero 
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->artista = htmlspecialchars(strip_tags($this->artista));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':artista', $this->artista);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    
}