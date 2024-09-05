<?php
require_once('../configs/conexion.php'); // Ruta actualizada

class Model {

    private $db = null;

    function create_connection() {
        global $config;
    
        $host = $config['database']['host'];
        $userName = $config['database']['userName'];
        $password = $config['database']['password'];
        $database = $config['database']['databasename'];
        $port = $config['database']['port'];
        
        try {
            $dsn = "pgsql:host=$host;port=$port;dbname=$database;";
        
            return new PDO($dsn, $userName, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
        } catch (Exception $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    
    } 
    
    function __construct() {
        $this->db = $this->create_connection();
    }

    function getDb() {
        return $this->db;
    }
}
?>


