// Mostrar el formulario de actualización al hacer clic en el botón de actualizar
document.getElementById('update-btn').addEventListener('click', () => {
    document.getElementById('overlay').style.display = 'flex';
});

// Obtener el formulario de actualización de canción
const form = document.getElementById('actualizar-cancion');
form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Evita el envío tradicional del formulario

    const formData = new FormData(form);
    console.log("📤 Datos enviados:", [...formData.entries()]);

    try {
        const response = await fetch('http://localhost:8000/index.php?action=actualizarCancion', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error); // Mostrar mensaje de error
        } else {
            alert(data.mensaje); // Mostrar mensaje de éxito
            location.reload(); // Recargar la página solo si la actualización fue exitosa
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al actualizar la canción.");
    }
});

// Obtener el formulario de eliminación de canción
const FormDelete = document.getElementById("deleteForm");
FormDelete.addEventListener('submit', async (e) => {
    e.preventDefault(); 
    const id = document.getElementById("cancion_id").value;
    try {
        const response = await fetch(`http://localhost:8000/index.php?action=eliminarCancion&id=${id}`, {
            method: 'DELETE',
            headers: {
                "Accept": "application/json", // Asegura que el backend devuelva JSON
            },
        });

        const data = await response.json();

        if (data.error) {
            alert(data.error); // Mostrar mensaje de error
        } else {
            alert(data.mensaje); // Mostrar mensaje de éxito
            location.reload();
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al eliminar la canción.");
    }
});

