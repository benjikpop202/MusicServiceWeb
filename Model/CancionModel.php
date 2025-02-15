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

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->artista = htmlspecialchars(strip_tags($this->artista));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        

        // Enlazar los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':artista', $this->artista);
        $stmt->bindParam(':genero', $this->genero);
       

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }

        return null;
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

    // Eliminar un canciones
    public function eliminarSiNoTieneLista($cancionId) {
        // Verificar si la canción está en alguna lista
        $sql = "SELECT COUNT(*) as total FROM ListaCancion WHERE id_cancion = :cancionId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cancionId', $cancionId, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($resultado['total'] == 0) {
            // Si no está en ninguna lista, eliminar la canción
            $sqlEliminar = "DELETE FROM Canciones WHERE id = :cancionId";
            $stmtEliminar = $this->db->prepare($sqlEliminar);
            $stmtEliminar->bindParam(':cancionId', $cancionId, PDO::PARAM_INT);
            return $stmtEliminar->execute();
        }
    
        return false; // No se elimina porque aún pertenece a una lista
    }
    
}