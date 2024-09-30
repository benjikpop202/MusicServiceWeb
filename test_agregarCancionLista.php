<?php
// Incluir la conexión a la base de datos y los archivos necesarios
require_once 'configs/Conexion.php';
require_once 'Model/DatabaseModel.php';
require_once 'controllers/CancionListaController.php';

// Crear una conexión a la base de datos
$db = (new Database())->getDb(); 

// Crear instancia del controlador CancionListaController
$cancionListaController = new CancionListaController($db);

// Simular los datos de un formulario POST
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['lista_id'] = 1;  // Cambiar el ID de la lista según tus datos
$_POST['cancion_id'] = 2;  // Cambiar el ID de la canción según tus datos

// Llamar al método para agregar la canción a la lista
$cancionListaController->agregarCancionALista();
