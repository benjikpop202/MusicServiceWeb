<?php
require_once('./configs/Conexion.php'); // Asegúrate de que la conexión esté bien
require_once('./model/DatabaseModel.php'); // Incluye la clase Database
require_once('./controllers/UserController.php'); // Incluye el controlador de usuario
try {
    // Crear una instancia de la clase Database
    $database = new Database();
    $db = $database->getDb();

    // Definir el ID del usuario y la nueva contraseña
    $userId = 1; // Cambia esto al ID del usuario que deseas actualizar
    $newPassword = 'nuevaContraseña'; // La nueva contraseña

    // Hashear la nueva contraseña
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Preparar la consulta para actualizar la contraseña
    $stmt = $db->prepare("UPDATE usuarios SET password = :password WHERE id = :id");
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':id', $userId);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Contraseña actualizada con éxito.";
    } else {
        echo "Error al actualizar la contraseña.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>






