<?php
 
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté disponible
require_once('./Model/DatabaseModel.php'); // Incluye los modelos, que dependen de la conexión
require_once('./controllers/ListasController.php'); // Incluye el controlador, que depende del modelo

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getDb();
$lista = new Listas($db);

// ID de la lista a actualizar
$lista_id = 3; // Cambia este valor si necesitas actualizar otra lista

// Datos para la actualización
$lista->id = $lista_id;
$lista->nombre = "Lista actualizada"; // Nuevo nombre
$lista->es_publica = false; // Cambiar visibilidad
$lista->usuario_id = 1; // Asegúrate de que este usuario existe

// Llamar al método para actualizar la lista
if ($lista->actualizarLista()) {
    echo "Lista actualizada con éxito.";
} else {
    echo "Error al actualizar la lista.";
}
?>
