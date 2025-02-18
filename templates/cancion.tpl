<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Canción</title>
    <link rel="stylesheet" href="{$base_url}/templates/styles/cancion.css">
</head>
<body>
    <header>
        <h1 style="text-align: center; font-size: 2em; color: purple; text-shadow: 2px 2px 4px #ccc;">
            Detalles de la Canción
        </h1>
    </header>
    <main id="song-container" style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
        <section id="song-info" style="background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 20px; width: 80%; max-width: 400px;">
            <h2 style="text-align: center;">Información de la Canción</h2>
            <p><strong>Nombre:</strong> {$cancion.nombre}</p>
            <p><strong>Artista:</strong> {$cancion.artista}</p>
            <p><strong>Género:</strong> {$cancion.genero}</p>
        </section>
        <div id="action-buttons" style="display: flex; gap: 20px;">
            <button id="update-btn" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                Actualizar Datos
            </button>
            <form id="deleteForm" onsubmit="return confirm('¿Estás seguro de eliminar esta canción?')" method="post" action="eliminar_cancion.php">
                <input type="hidden" name="id" value="{$cancion.id}">
                <button type="submit" id="delete-btn" style="background-color: #F44336; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Eliminar Canción
                </button>
            </form>
        </div>
    </main>

    <script>
        document.getElementById("update-btn").addEventListener("click", function() {
            alert("Función de actualización en construcción.");
        });
    </script>
</body>
</html>

