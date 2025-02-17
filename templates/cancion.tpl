<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Canciones</title>
    <!-- Importa el archivo de estilos -->
    <link rel="stylesheet" href="css/canciones.css">
</head>
<body>

    <h1>Lista de Canciones</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Artista</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$canciones item=cancion}
            <tr>
                <td>{$cancion.id}</td>
                <td>{$cancion.titulo}</td>
                <td>{$cancion.artista}</td>
                <td>
                    <!-- Botón para actualizar -->
                    <button class="update-btn" data-id="{$cancion.id}" data-titulo="{$cancion.titulo}" data-artista="{$cancion.artista}">Actualizar</button>
                    
                    <!-- Formulario para eliminar -->
                    <form class="deleteForm" method="post">
                        <input type="hidden" name="id" value="{$cancion.id}">
                        <button type="submit" class="delete-btn">Eliminar</button>
                    </form>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>

    <!-- Overlay para actualizar canción -->
    <div id="overlay" class="overlay" style="display:none;">
        <form id="actualizar" method="post" class="form-actualizar">
            <h2>Actualizar Canción</h2>
            <input type="hidden" name="id" id="idActualizar">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="tituloActualizar" required>
            <label for="artista">Artista:</label>
            <input type="text" name="artista" id="artistaActualizar" required>
            <button type="submit" class="btn-guardar">Guardar Cambios</button>
            <button type="button" class="btn-cancelar" onclick="document.getElementById('overlay').style.display='none';">Cancelar</button>
        </form>
    </div>

    <!-- Importa el archivo de JavaScript separado -->
    <script src="js/cancion.js"></script>
</body>
</html>
