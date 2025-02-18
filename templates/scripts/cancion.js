// Mostrar el formulario de actualización al hacer clic en el botón de actualizar
document.getElementById('update-btn').addEventListener('click', () => {
    document.getElementById('overlay').style.display = 'flex';
});
document.getElementById('btnCancelar').addEventListener("click", () =>{
    document.getElementById('overlay').style.display = 'none';
})

document.getElementById("updateCancion").addEventListener("click", ActualizarCancion);
document.getElementById("delete-btn").addEventListener("click", eliminarCancion)
// Obtener el formulario de actualización de canción

async function ActualizarCancion(){

    const cancionId = document.getElementById("id-cancion").value.trim();
    const nombreCancion = document.getElementById("nombreCancion").value.trim();
    const artistaCancion = document.getElementById("artistaCancion").value.trim();
    const generoCancion = document.getElementById("generoCancion").value.trim();


    let formData = new FormData();
    formData.append("id", cancionId);
    formData.append("nombre", nombreCancion);
    formData.append("artista", artistaCancion);
    formData.append("genero", generoCancion);

    try {
        const response = await fetch('http://localhost:8000/index.php?action=actualizarCancion', {
            method: 'POST',
            body: formData
        });

        const data = await response.text();
        console.log(data);

        if (data.error) {
            alert(data.error); // Mostrar mensaje de error
        } else {
            alert("Canción actualizada exitosamente."); // Mostrar mensaje de éxito
            location.reload(); // Recargar la página solo si la actualización fue exitosa
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al actualizar la canción.");
    }
};

// Obtener el formulario de eliminación de canción
async function eliminarCancion(){

 
 let userId = document.getElementById("userId").value
 let cancionId = document.getElementById("cancionId").value
 let listaId = document.getElementById("listaId").value

 if (!confirm("¿Estás seguro de que deseas eliminar esta lista?")) return;

    try {
        const response = await fetch(`http://localhost:8000/index.php?action=eliminarCancion&idCancion=${cancionId}&idLista=${listaId}`, {
            method: 'DELETE',
        });

        const data = await response.text();

        if (data.error) {
            alert(data.error); // Mostrar mensaje de error
        } else {
            alert("cancion eliminada exitosamente"); // Mostrar mensaje de éxito
            window.location.replace(`/home/${userId}/lista/${listaId}`);
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al eliminar la canción.");
    }
}


