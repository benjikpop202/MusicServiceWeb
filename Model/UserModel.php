<?php

class Usuario {
    private $db;
    private $table = "Usuarios";

    public $id;
    public $name;
    public $gmail;
    public $password;
    public $status;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo usuario
    public function crearUsuario() {
        $query = "INSERT INTO " . $this->table . " (name, gmail, password, status) 
                  VALUES (:name, :gmail, :password, :status)";

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->gmail = htmlspecialchars(strip_tags($this->gmail));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->status = htmlspecialchars(strip_tags($this->status));

        // Enlazar los parámetros
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':gmail', $this->gmail);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':status', $this->status);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener un usuario por ID
    public function obtenerUsuarioPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->name = $row['name'];
            $this->gmail = $row['gmail'];
            $this->password = $row['password'];
            $this->status = $row['status'];
        }
    }

    // Actualizar un usuario
    public function actualizarUsuario() {
        $query = "UPDATE " . $this->table . " 
                  SET password = :password
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Enlazar los parámetros
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':id', $this->id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un usuario
    public function eliminarUsuario() {
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
