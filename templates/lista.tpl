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
            <h1 id="nombreLista">Lista {$lista.nombre}</h1>
        </div>
        <div class="content">
            <div class="sidebar">
                <button class="action-button edit-button" id="update-btn">Editar lista</button>
                
              <button class="action-button delete-button" id="btnEliminarLista">
                Eliminar lista
                <input type="hidden" id="usuario-id" name="usuario_id" value="{$lista.usuario_id}">
                </button>
                <button class="action-button add-button">Agregar canciones</button>
            </div>
        </div>
    </div>

    <!-- Overlay para Actualizar Lista -->
    <div id="overlay">
        <div class="overlay-content">
            <h3>Editar Lista</h3>
            <input type="hidden" id="listaId" value="{$lista.id}">
            <input type="text" id="nuevoNombre" placeholder="Nuevo nombre de la lista" value="{$lista.nombre}">
            <button id="btnActualizarLista">Guardar</button>
            <button onclick="document.getElementById('overlay').style.display='none'">Cancelar</button>
        </div>
    </div>

    <script src="/templates/scripts/lista.js"></script>
</body>
</html>



