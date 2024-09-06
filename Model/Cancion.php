<?php


class Usuario {
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

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nomre));
        $this->artista = htmlspecialchars(strip_tags($this->artista));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        

        // Enlazar los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':artista', $this->artista);
        $stmt->bindParam(':genero', $this->genero);
       

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todos las canciones
    public function obtenerCanciones() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una cancion por ID
    public function obtenerCancionesPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->genero = $row['genero'];
            $this->artista = $row['artista'];
            
        }
    }

    // Actualizar una cancion
    public function actualizarCanciones() {
        $query = "UPDATE " . $this->table . " 
                  SET nombre = :nombre, artista = :artista, genero = :genero, 
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

    // Eliminar un canciones
    public function eliminarCanciones() {
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



    

   
        
    
