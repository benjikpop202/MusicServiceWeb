
    const canciones = document.querySelectorAll(".cancion");
    const overlay = document.getElementById("overlay");
    const overlayNombre = document.getElementById("overlay-nombre");
    const overlayArtista = document.getElementById("overlay-artista");
    const overlayGenero = document.getElementById("overlay-genero");
    const cerrarOverlay = document.getElementById("cerrar-overlay");

    canciones.forEach(cancion => {
        cancion.addEventListener("click", function () {
            // Obtener los datos de la canción desde los atributos `data-`
            const nombre = this.getAttribute("data-nombre");
            const artista = this.getAttribute("data-artista");
            const genero = this.getAttribute("data-genero");

            // Asignar los valores al overlay
            overlayNombre.textContent = nombre;
            overlayArtista.textContent = artista;
            overlayGenero.textContent = genero;

            // Mostrar el overlay
            overlay.style.display = "flex";
        });
    });

    // Cerrar el overlay al hacer clic en el botón
    cerrarOverlay.addEventListener("click", function () {
        overlay.style.display = "none";
    });

    // Cerrar el overlay al hacer clic fuera del contenido
    overlay.addEventListener("click", function (event) {
        if (event.target === overlay) {
            overlay.style.display = "none";
        }
    });

