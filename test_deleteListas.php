<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/ListasController.php'); // Incluye el controlador, que depende del modelo

// Crear una instancia de la conexión
$db = (new Database())->getDb(); 
// Crear una instancia del controlador de listas
$listaController = new ListaController($db);

// Simular una petición DELETE
$_SERVER["REQUEST_METHOD"] = "DELETE";

// Simular el ID de la lista a eliminar (en este caso, 'id=1')
$id = 1; // Cambia a 2 si quieres eliminar la lista con id=2

// Ejecutar el método para eliminar la lista
$listaController->eliminarLista($id);
?>
