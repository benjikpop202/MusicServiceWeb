<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$lista.nombre} - Music Service</title>
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
    <link rel="stylesheet" href="/templates/styles/lista.css"/>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Lista {$lista.nombre}</h1>
        </div>
        <div class="content">
            <div class="sidebar">
                <button class="action-button edit-button">Editar lista</button>
                <button class="action-button delete-button">Eliminar lista</button>
                <button class="action-button add-button">Agregar canciones</button>
            </div>
        </div>
    </div>
</body>
</html>


