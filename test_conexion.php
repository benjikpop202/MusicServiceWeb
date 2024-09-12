<?php
require_once('./configs/Conexion.php');
require_once('./Model/DatabaseModel.php'); // Asegúrarse de que la ruta sea correcta

$model = new Database();

try {
    $db = $model->getDb();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>







