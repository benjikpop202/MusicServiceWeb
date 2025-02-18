<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Detalles de la Canción</title>
    <link rel="stylesheet" href="{$base_url}/templates/styles/canciones.css">
</head>
<body>
    <header>
        <h1 style="text-align: center; font-size: 2em; color: purple; text-shadow: 2px 2px 4px #ccc;">
            Detalles de la Canción
        </h1>
    </header>
    <main id="song-container" style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
        <section id="song-info" style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 20px; width: 80%; max-width: 400px;">
            <p><strong>Nombre:</strong> {$cancion.nombre}</p>
            <p><strong>Artista:</strong> {$cancion.artista}</p>
            <p><strong>Género:</strong> {$cancion.genero}</p>
        </section>
        <div id="action-buttons" style="display: flex; gap: 20px;">
            <button id="update-btn" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Actualizar Datos
            </button>
            <div id="overlay">
                <div class="overlay-content">
                <input id="id-cancion" type="hidden" value="{$cancion.id}">
                <label for="nombreCancion">Nombre de la Canción:</label><br>
                <input type="text" id="nombreCancion" value="{$cancion.nombre}" required>
                <label for="artistaCancion">Artista:</label><br>
                <input type="text" id="artistaCancion" value="{$cancion.artista}" required>
                <label for="generoCancion">Género:</label><br>
                <input type="text" id="generoCancion" value="{$cancion.genero}" required>
                <button type="submit" id="updateCancion">Actualizar</button>
                <button type="button" id="btnCancelar">Cancelar</button>
                </div>
            </div>
              <button type="submit" id="delete-btn" style="background-color: #F44336; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                <input type="hidden" id="userId" value="{$usuario.id}">
                <input type="hidden" id="cancionId" value="{$cancion.id}">
                <input type="hidden" id="listaId" value="{$lista.id}">
                Eliminar Canción
                </button>
        </div>
    </main>

    <script src="/templates/scripts/cancion.js"></script>
</body>
</html>

