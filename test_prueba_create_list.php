<?php
include_once(__DIR__ . '/configs/Conexion.php'); // Ruta a la conexión
include_once(__DIR__ . '/Model/DatabaseModel.php'); // Conexión a la base de datos
include_once(__DIR__ . '/controllers/UserController.php'); // Controlador de usuarios
include_once(__DIR__ . '/controllers/ListasController.php'); // Controlador de listas

// Verifica si las clases existen
if (!class_exists('Database')) {
    die('La clase Database no se pudo cargar.');
}

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();

// Instanciar el controlador de listas
$listaController = new ListaController($db); // Asegúrate de usar el nombre correcto

// Datos de prueba para la creación de la lista
$nombreLista = 'Lista pop'; // Nombre de la lista
$usuarioId = 4; // ID del usuario que crea la lista (ajusta según tus datos)
$esPublica = 1; // Cambia a 0 si es privada

// Llamar a la función que crea la lista
$listaController->crearLista($nombreLista, $usuarioId);

// Confirmación de creación
echo "Lista '$nombreLista' creada con éxito.";
?>
