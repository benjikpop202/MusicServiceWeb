<?php
require_once('C:\xampp\htdocs\MusicServiceWeb\configs');
require_once('C:\xampp\htdocs\MusicServiceWeb\Model'); // Asegúrarse de que la ruta sea correcta

$model = new Model();

try {
    $db = $model->getDb();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>






