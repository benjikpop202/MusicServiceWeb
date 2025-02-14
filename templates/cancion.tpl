<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión Canciones</title>
    <link rel="stylesheet" href="{$base_url}/templates/styles/canciones.css">
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
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                <input type="text" id="artista" name="artista" placeholder="Artista" required>
                <input type="text" id="genero" name="genero" placeholder="Género" required>
                <button type="submit" class="btn">Guardar Canción</button>
            </form>
            <button class="btn cerrar" id="cerrarOverlay">Cerrar</button>
        </div>
    </div>

    <!-- Mensaje de Éxito -->
    <p class="mensaje" id="mensajeExito" style="display: none;">¡Canción cargada exitosamente!</p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cargarCancionBtn = document.getElementById("cargarCancionBtn");
            const cuentaCancionBtn = document.getElementById("cuentaCancionBtn");
            const formOverlay = document.getElementById("formOverlay");
            const mensajeExito = document.getElementById("mensajeExito");

            // Mostrar formulario de cargar canción
            cargarCancionBtn.addEventListener("click", function() {
                formOverlay.style.display = "block";
                mensajeExito.style.display = "none"; // Oculta el mensaje de éxito
            });

            // Cerrar formulario
            document.getElementById("cerrarOverlay").addEventListener("click", function() {
                formOverlay.style.display = "none";
            });

            // Manejar el envío del formulario
            document.getElementById("cargarCancionForm").addEventListener("submit", function(event) {
                event.preventDefault();
                formOverlay.style.display = "none";
                mensajeExito.style.display = "block"; // Muestra el mensaje de éxito
            });
        });
    </script>
</body>
</html>








