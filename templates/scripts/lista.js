
document.addEventListener("DOMContentLoaded", function () {
    // Mostrar el formulario para editar lista
    document.getElementById("update-btn").addEventListener("click", () => {
        document.getElementById("overlay").style.display = "flex";
    });

    // Eventos para actualizar y eliminar lista
    document.getElementById("btnActualizarLista").addEventListener("click", actualizarLista);
    document.getElementById("btnEliminarLista").addEventListener("click", eliminarLista);

    // Evento para abrir el formulario de agregar canción
    const agregarCancionBtn = document.getElementById("agregarCancionBtn");
    if (agregarCancionBtn) {
        agregarCancionBtn.addEventListener("click", () => {
            document.getElementById("overlay-cancion").style.display = "flex";
        });
    }

    // Evento para cancelar el formulario de agregar canción
    document.getElementById("btnCancelar").addEventListener("click", () => {
        document.getElementById("overlay-cancion").style.display = "none";
    });

    // Evento para enviar el formulario de agregar canción
    document.getElementById("form-Cancion").addEventListener("submit", agregarCancion);
});

async function actualizarLista() {
    const listaId = document.getElementById("listaId").value.trim();
    const nuevoNombre = document.getElementById("nuevoNombre").value.trim();

    if (!listaId || !nuevoNombre) {
        alert("El nombre de la lista no puede estar vacío.");
        return;
    }

    let formData = new FormData();
    formData.append("id", listaId);
    formData.append("nombre", nuevoNombre);

    try {
        const response = await fetch("http://localhost:8000/index.php?action=actualizarLista", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error);
        } else {
            alert(data.mensaje);
            document.getElementById("nombreLista").textContent = nuevoNombre;
            document.getElementById("overlay").style.display = "none";
            location.reload();
        }
    } catch (error) {
        console.error("Error al actualizar la lista:", error);
        alert("Hubo un error al actualizar la lista.");
    }
}

async function eliminarLista() {
    const listaId = document.getElementById("listaId").value.trim();
    const usuario_id = document.getElementById("usuario-id").value;
    if (!listaId) {
        alert("No se encontró el ID de la lista.");
        return;
    }

    if (!confirm("¿Estás seguro de que deseas eliminar esta lista?")) return;

    try {
        const response = await fetch(`http://localhost:8000/index.php?action=eliminarLista&id=${listaId}`, {
            method: "DELETE",
            headers: {
                "Accept": "application/json"
            }
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error);
        } else {
            alert(data.mensaje);
            window.location.replace(`/home/${usuario_id}`);
        }
    } catch (error) {
        console.error("Error al eliminar la lista:", error);
        alert("Hubo un error al eliminar la lista.");
    }
}

// Función para obtener el ID del usuario
function obtenerUsuarioId() {
    return localStorage.getItem("usuario_id") || "default";
}

// Publicar lista
const Publicar = document.getElementById("publicLista");
Publicar.addEventListener("click", async () => {
    const Lista = document.getElementById("public");
    const listaId = document.getElementById("listaId").value.trim();
    if (!confirm("¿Publicar Lista?")) return;
    Lista.value = "true";

    let formData = new FormData();
    formData.append("id", listaId);
    formData.append("es_publica", Lista.value);

    try {
        const response = await fetch("http://localhost:8000/index.php?action=actualizarLista", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error);
        } else {
            alert(data.mensaje);
            location.reload();
        }
    } catch (error) {
        console.error("Error al actualizar la lista:", error);
        alert("Hubo un error al actualizar la lista.");
    }
});

// Función para agregar canción
async function agregarCancion(event) {
    event.preventDefault();

    const nombreCancion = document.getElementById("nombreCancion").value.trim();
    const artistaCancion = document.getElementById("artistaCancion").value.trim();
    const generoCancion = document.getElementById("generoCancion").value.trim();
    const listaId = document.getElementById("agregarCancionBtn").getAttribute("data-lista-id");

    if (!nombreCancion || !artistaCancion || !generoCancion) {
        alert("Todos los campos son obligatorios.");
        return;
    }

    let formData = new FormData();
    formData.append("nombre", nombreCancion);
    formData.append("artista", artistaCancion);
    formData.append("genero", generoCancion);
    formData.append("lista_id", listaId);

    try {
        const response = await fetch("http://localhost:8000/index.php?action=agregarCancion", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error);
        } else {
            alert("Canción agregada exitosamente.");

            // Limpiar el formulario y ocultarlo
            document.getElementById("nombreCancion").value = "";
            document.getElementById("artistaCancion").value = "";
            document.getElementById("generoCancion").value = "";
            document.getElementById("overlay-cancion").style.display = "none";

            // Recargar la lista de canciones
            recargarCanciones();
        }
    } catch (error) {
        console.error("Error al agregar la canción:", error);
        alert("Hubo un error al agregar la canción.");
    }
}

// Función para recargar la lista de canciones
async function recargarCanciones() {
    const listaId = document.getElementById("agregarCancionBtn").getAttribute("data-lista-id");

    try {
        const response = await fetch(`http://localhost:8000/index.php?action=obtenerCanciones&lista_id=${listaId}`);
        const canciones = await response.json();

        const cancionesUl = document.getElementById("canciones");
        cancionesUl.innerHTML = "";

        canciones.forEach(cancion => {
            const li = document.createElement("li");
            li.textContent = `${cancion.nombre} - ${cancion.artista} (${cancion.genero})`;
            cancionesUl.appendChild(li);
        });
    } catch (error) {
        console.error("Error al recargar las canciones:", error);
        alert("Hubo un error al recargar las canciones.");
    }
}








