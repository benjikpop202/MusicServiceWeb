<?php
require_once('../configs/conexion.php');
require_once('../model/Model.php'); // Asegúrarse de que la ruta sea correcta

$model = new Model();

try {
    $db = $model->getDb();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>






