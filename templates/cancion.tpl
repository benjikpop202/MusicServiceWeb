<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Canciones</title>
    <link rel="stylesheet" href="/templates/styles/canciones.css">
</head>
<body>
    <!-- Título centrado y grande -->
    <h1>Sesión Canciones</h1>

    <!-- Contenedor para los botones -->
    <div class="button-container">
        <button class="btn" id="cargarCancionBtn">Cargar Canción</button>
        <button class="btn" id="cuentaCancionBtn">Cuenta Canción</button>
    </div>

    <!-- Overlay y Formulario de Cargar Canción -->
    <div class="overlay" id="formOverlay" style="display: none;">
        <div class="form-container">
            <h2>Cargar Canción</h2>
            <form id="cargarCancionForm">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="artista" placeholder="Artista" required>
                <input type="text" name="genero" placeholder="Género" required>
                <button type="submit" class="btn">Guardar Canción</button>
            </form>
            <button class="btn cerrar" id="cerrarOverlay">Cerrar</button>
        </div>
    </div>

    <!-- Información de Canción -->
    <div class="info-cancion" id="infoCancion" style="display: none;">
        <h3>Nombre: <span id="nombreCancion"></span></h3>
        <p>Artista: <span id="artistaCancion"></span></p>
        <p>Género: <span id="generoCancion"></span></p>
        <button class="btn" id="eliminarCancionBtn">Eliminar Canción</button>
    </div>

    <!-- Mensajes -->
    <p class="mensaje" id="mensajeExito" style="display: none;">¡Canción cargada exitosamente!</p>
    <p class="mensaje" id="mensajeEliminada" style="display: none;">¡Canción eliminada exitosamente!</p>

    <script src="/templates/scripts/cancion.js"></script>
</body>
</html>




