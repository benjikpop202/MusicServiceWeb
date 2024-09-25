<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/ListasController.php'); // Incluye el controlador, que depende del modelo

// Crear una instancia de la conexión
$db = (new Database())->getDb(); 
// Crear una instancia del controlador de listas
$listaController = new ListaController($db);

// Simular una petición POST con los datos de la lista
$_SERVER["REQUEST_METHOD"] = "POST";
$_POST['nombre'] = 'Lista de prueba';
$_POST['es_publica'] = 1;  // 1 = pública, 0 = privada
$_POST['usuario_id'] = 1;  // Suponiendo que el usuario con ID 1 existe en la base de datos

// Ejecutar el método para crear la lista
$listaController->crearLista();
?>