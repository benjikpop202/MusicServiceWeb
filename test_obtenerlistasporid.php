<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/ListasController.php'); // Incluye el controlador, que depende del modelo

// Crear una instancia de la conexión
$db = (new Database())->getDb();

// Crear una instancia del controlador de listas
$listaController = new ListaController($db);

// Simular el ID de la lista a obtener (en este caso, 'id=1')
$id = 1; // Cambia el valor si deseas obtener otra lista

// Ejecutar el método para obtener la lista por ID
$lista = $listaController->obtenerListaPorId($id);

// Verificar si se encontró la lista
if ($lista) {
    // Imprimir los datos de la lista obtenida
    echo json_encode($lista);
} else {
    // Si no se encontró la lista
    echo "No se encontró la lista con ID $id.";
}
?>

