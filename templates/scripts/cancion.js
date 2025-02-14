// Botones y Elementos
const cargarCancionBtn = document.getElementById('cargarCancionBtn');
const cuentaCancionBtn = document.getElementById('cuentaCancionBtn');
const formOverlay = document.getElementById('formOverlay');
const cargarCancionForm = document.getElementById('cargarCancionForm');
const infoCancion = document.getElementById('infoCancion');
const nombreCancion = document.getElementById('nombreCancion');
const artistaCancion = document.getElementById('artistaCancion');
const generoCancion = document.getElementById('generoCancion');
const eliminarCancionBtn = document.getElementById('eliminarCancionBtn');
const actualizarCancionBtn = document.getElementById('actualizarCancionBtn');
const cerrarOverlay = document.getElementById('cerrarOverlay');

// Mostrar Formulario de Carga
cargarCancionBtn.addEventListener('click', () => {
    formOverlay.style.display = 'block';
});

// Cerrar Formulario al hacer clic fuera del mismo
window.addEventListener('click', (e) => {
    if (e.target === formOverlay) {
        formOverlay.style.display = 'none';
    }
});

// Cerrar Formulario al hacer clic en el botón "Cerrar"
cerrarOverlay.addEventListener('click', () => {
    formOverlay.style.display = 'none';
});

// Cargar Canción
cargarCancionForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = new FormData(cargarCancionForm);
    const cancion = {
        nombre: data.get('nombre'),
        artista: data.get('artista'),
        genero: data.get('genero')
    };

    // Validación adicional
    if (cancion.nombre && cancion.artista && cancion.genero) {
        // Usando fetch para enviar datos al backend PHP
        fetch('{$base_url}/cancion/cargar', {
            method: 'POST',
            body: JSON.stringify(cancion),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarCancion();
                formOverlay.style.display = 'none';
                mostrarMensaje('mensajeExito');
            } else {
                alert('Error al guardar la canción.');
            }
        })
        .catch(error => console.error('Error:', error));
    } else {
        alert('Por favor, complete todos los campos.');
    }
});

// Mostrar Información de Canción
function mostrarCancion() {
    fetch('{$base_url}/cancion/obtener')
    .then(response => response.json())
    .then(cancion => {
        if (cancion) {
            nombreCancion.textContent = cancion.nombre;
            artistaCancion.textContent = cancion.artista;
            generoCancion.textContent = cancion.genero;
            infoCancion.style.display = 'block';
        } else {
            infoCancion.style.display = 'none';
        }
    })
    .catch(error => console.error('Error:', error));
}

// Eliminar Canción
eliminarCancionBtn.addEventListener('click', () => {
    fetch('{$base_url}/cancion/eliminar', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            infoCancion.style.display = 'none';
            mostrarMensaje('mensajeEliminada');
        } else {
            alert('Error al eliminar la canción.');
        }
    })
    .catch(error => console.error('Error:', error));
});

// Actualizar Datos
actualizarCancionBtn.addEventListener('click', () => {
    formOverlay.style.display = 'block';
    cargarCancionBtn.style.display = 'none';
    cuentaCancionBtn.style.display = 'none';
});

// Mostrar Mensajes Temporales
function mostrarMensaje(idMensaje) {
    const mensaje = document.getElementById(idMensaje);
    mensaje.style.display = 'block';
    setTimeout(() => {
        mensaje.style.display = 'none';
    }, 3000);
}

// Inicializar
mostrarCancion();

