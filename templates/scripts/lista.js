document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("update-btn").addEventListener("click", () => {
        document.getElementById("overlay").style.display = "flex"; // Muestra el formulario
    });

    document.getElementById("btnActualizarLista").addEventListener("click", actualizarLista);
    document.getElementById("btnEliminarLista").addEventListener("click", eliminarLista);
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
            document.getElementById("overlay").style.display = "none"; // Oculta el formulario
            location.reload(); // Recarga la página
        }
    } catch (error) {
        console.error("Error al actualizar la lista:", error);
        alert("Hubo un error al actualizar la lista.");
    }
}

async function eliminarLista() {
    const listaId = document.getElementById("listaId").value.trim();
    const usuario_id = document.getElementById("usuario-id").value
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

            // Obtener el ID del usuario desde localStorage o PHP
            const usuarioId = obtenerUsuarioId();
            window.location.replace(`/home/${usuario_id}`);
        }
    } catch (error) {
        console.error("Error al eliminar la lista:", error);
        alert("Hubo un error al eliminar la lista.");
    }
}

// Función para obtener el ID del usuario
function obtenerUsuarioId() {
    return localStorage.getItem("usuario_id") || "default"; // Cambia "default" por un valor válido si es necesario
}



const Publicar = document.getElementById("publicLista")
Publicar.addEventListener("click", async ()=>{
    const Lista = document.getElementById("public")
    const listaId = document.getElementById("listaId").value.trim();
    if (!confirm("publicar Lista ?")) return;
    Lista.value = "true"
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
            location.reload(); // Recarga la página
        }
    } catch (error) {
        console.error("Error al actualizar la lista:", error);
        alert("Hubo un error al actualizar la lista.");
    }

} )







