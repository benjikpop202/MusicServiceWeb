<?php
require_once('./configs/Conexion.php');  // Incluye la configuración de la base de datos
require_once('./model/DatabaseModel.php'); // Asegúrate de incluir el modelo de la base de datos
require_once('./controllers/UserController.php'); // Incluye el controlador de usuario

// Crear una instancia de la clase Database
$database = new Database();
$db = $database->getDb();

// Crear una instancia del controlador de usuario
$usuarioController = new UsuarioController($db);

// Eliminar un usuario con ID 1 (ejemplo)
$usuarioController->eliminarUsuario(1);
?>






