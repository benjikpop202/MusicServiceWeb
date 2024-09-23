<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté bien
require_once('./model/DatabaseModel.php'); // Incluye la clase Database

try {
    // Crear una instancia de la clase Database
    $database = new Database();
    $db = $database->getDb();

    // Definir el ID del usuario que deseas eliminar
    $userId = 1; // Cambia esto al ID del usuario que deseas eliminar

    // Preparar la consulta para eliminar el usuario
    $stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $userId);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar el usuario.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

