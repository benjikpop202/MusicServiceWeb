<?php
require_once('./configs/Conexion.php');
require_once('./Model/DatabaseModel.php'); // Asegúrate de tener este archivo correcto
require_once('./controllers/UserController.php'); // El archivo donde está la clase UsuarioController

// Crear una instancia de la conexión
$db = (new Database())->getDb();

// Crear una instancia del controlador de usuarios
$usuarioController = new UsuarioController($db); // Cambia a 'UsuarioController'

// Simular una petición DELETE
$_SERVER["REQUEST_METHOD"] = "DELETE";

// Simular el ID del usuario a eliminar
$id = 2; // Cambia el ID según el usuario que quieras eliminar

// Ejecutar el método para eliminar el usuario
$usuarioController->eliminarUsuario($id); 
