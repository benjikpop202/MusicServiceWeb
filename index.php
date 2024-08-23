<?php
// Incluye el archivo principal de Smarty. Ajusta la ruta según sea necesario.
require_once('C:\xampp\htdocs\MusicService\libs\Smarty.class.php');

// Configuración de la base de datos
$config = [];
$config['database']['host'] = 'pgdb'; // Cambia esto si el host es diferente
$config['database']['userName'] = 'postgres'; // Nombre de usuario
$config['database']['password'] = 'postgres'; // Contraseña
$config['database']['databasename'] = 'tareas'; // Nombre de la base de datos
$config['database']['port'] = '5432'; // Puerto de conexión

function create_connection($baseConfig) {
    $config = $baseConfig;

    $host = $config['host'];
    $userName = $config['userName'];
    $password = $config['password'];
    $database = $config['databasename'];
    $port = $config['port'];

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$database;";
        return new PDO($dsn, $userName, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear conexión a la base de datos
    $db = create_connection($config['database']);

    // Verificar credenciales
    $sql = 'SELECT * FROM usuarios WHERE username = :username AND password = :password';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Credenciales válidas
        echo '¡Bienvenido, ' . htmlspecialchars($username) . '!';
        // Aquí puedes redirigir a una página de usuario o inicio
    } else {
        // Credenciales inválidas
        echo 'Nombre de usuario o contraseña incorrectos.';
    }
} else {
// Crea una instancia de Smarty

$smarty = new Smarty\Smarty;

// Configura los directorios de Smarty. Usa __DIR__ para obtener la ruta absoluta
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Prueba la instalación de Smarty para asegurarte de que todo esté configurado correctamente
$smarty->testInstall();
$mensaje = "Hola, Smarty!";
$smarty->assign('variable', $mensaje);

// Muestra la plantilla
$smarty->display('templates.tpl');
}
?>