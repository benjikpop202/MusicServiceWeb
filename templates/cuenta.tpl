<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="/templates/styles/cuenta.css"> <!-- Estilos para esta sección -->
</head>
<body>
    <header>
        <h1>Bienvenido {$usuario['name']}</h1>
    </header>
    <main id="account-container">
        <section id="user-info">
            <h2>Detalles de tu cuenta</h2>
            <p><strong>Nombre:</strong> {$usuario['name']}</p>
            <p><strong>Email:</strong> {$usuario['gmail']}</p>
            <p><strong>Estado:</strong> {$usuario['status']}</p>
        </section>
        <div id="action-buttons">
            <form action="/cuenta/actualizar" method="post">
                <input type="hidden" name="id" value="cebu">
                <button type="submit" id="update-btn">Actualizar Datos</button>
            </form>
            <form action="/cuenta/eliminar" method="post" onsubmit="return confirm('¿Estás seguro de eliminar tu cuenta?')">
                <input type="hidden" name="id" value="cebu">
                <button type="submit" id="delete-btn">Eliminar Cuenta</button>
            </form>
            <script src="/templates/scripts/cuenta.js" type="text/javascript"></script>
        </div>
    </main>
</body>
</html>


