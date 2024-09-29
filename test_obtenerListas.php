<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/ListasController.php'); // Incluye el controlador, que depende del modelo


// Crea una nueva instancia de la clase Database
$database = new Database();

// Obtén la conexión a la base de datos
$db = $database->getDb();


// Crea el controlador de listas con la conexión
$controller = new ListaController($db);

// Llama al método para obtener todas las listas
$controller->obtenerListas();
?>

