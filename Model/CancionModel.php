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

    // Crear una nueva cancion
public function crearCanciones() {
    $query = "INSERT INTO " . $this->table . " (nombre, artista, genero) 
              VALUES (:nombre, :artista, :genero)";

    try {
        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->artista = htmlspecialchars(strip_tags($this->artista));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        
        // Enlazar los parámetros con especificación de tipo
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':artista', $this->artista, PDO::PARAM_STR);
        $stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $lastInsertId = $this->db->lastInsertId();
            
            // Verificar si se generó un ID válido
            if (!empty($lastInsertId)) {
                return $lastInsertId;
            }
        }
        
        return null; // Retorna null si no se insertó correctamente
        
    } catch (PDOException $e) {
        // Mostrar error detallado (solo para desarrollo, quítalo en producción)
        echo "Error al crear canción: " . $e->getMessage();
        return null;
    }
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