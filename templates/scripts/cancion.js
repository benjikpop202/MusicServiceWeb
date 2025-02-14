// Elementos del DOM
const form = document.getElementById('cargarCancionForm');
const formOverlay = document.getElementById('formOverlay');
const mensajeExito = document.getElementById('mensajeExito');
const mensajeEliminada = document.getElementById('mensajeEliminada');
const infoCancion = document.getElementById('infoCancion');
const nombreCancion = document.getElementById('nombreCancion');
const artistaCancion = document.getElementById('artistaCancion');
const generoCancion = document.getElementById('generoCancion');
const cuentaCancionBtn = document.getElementById('cuentaCancionBtn');
const eliminarCancionBtn = document.getElementById('eliminarCancionBtn');
const cargarCancionBtn = document.getElementById('cargarCancionBtn');
const cerrarOverlay = document.getElementById('cerrarOverlay');

// Mostrar el formulario al presionar "Cargar Canción"
cargarCancionBtn.addEventListener('click', () => {
    formOverlay.style.display = 'block';
});

// Cerrar el formulario
cerrarOverlay.addEventListener('click', () => {
    formOverlay.style.display = 'none';
});

// Al guardar la canción
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const nombre = form.nombre.value;
    const artista = form.artista.value;
    const genero = form.genero.value;

    // Guardar en localStorage
    const cancion = {
        nombre: nombre,
        artista: artista,
        genero: genero
    };
    localStorage.setItem('cancionGuardada', JSON.stringify(cancion));

    // Mostrar mensaje de éxito y ocultar el formulario
    formOverlay.style.display = 'none';
    mensajeExito.textContent = '¡Canción cargada exitosamente!';
    mensajeExito.style.display = 'block';
    setTimeout(() => {
        mensajeExito.style.display = 'none';
    }, 3000);

    // Limpiar formulario
    form.reset();
});

// Mostrar información al presionar "Cuenta Canción"
cuentaCancionBtn.addEventListener('click', () => {
    const cancionGuardada = JSON.parse(localStorage.getItem('cancionGuardada'));

    if (cancionGuardada) {
        // Si hay una canción guardada, se muestra la información
        nombreCancion.textContent = cancionGuardada.nombre;
        artistaCancion.textContent = cancionGuardada.artista;
        generoCancion.textContent = cancionGuardada.genero;
        infoCancion.style.display = 'block';
    } else {
        alert('No hay ninguna canción guardada.');
    }
});

// Eliminar canción guardada
eliminarCancionBtn.addEventListener('click', () => {
    localStorage.removeItem('cancionGuardada');
    infoCancion.style.display = 'none';
    mensajeEliminada.style.display = 'block';
    setTimeout(() => {
        mensajeEliminada.style.display = 'none';
    }, 3000);
});

