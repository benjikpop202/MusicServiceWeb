// Muestra el overlay para actualizar la canción
document.getElementById('update-btn').addEventListener('click', () => {
    document.getElementById('overlay').style.display = 'flex';
});

// Maneja el envío del formulario de actualización
const formActualizar = document.getElementById('actualizar');
formActualizar.addEventListener('submit', async (e) => {
    e.preventDefault(); // Evita el envío tradicional del formulario

    const formData = new FormData(formActualizar);
    console.log("📤 Datos enviados para actualizar:", [...formData.entries()]);

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
        console.error("Error en la solicitud de actualización:", error);
        alert("Hubo un error al actualizar la canción.");
    }
});

// Maneja el envío del formulario de eliminación
const formEliminar = document.getElementById("deleteForm");
formEliminar.addEventListener('submit', async (e) => {
    e.preventDefault(); 
    const id = document.getElementById("idCancion").value; // Asegúrate de que el input tenga el ID correcto
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
            location.reload(); // Recargar la página para reflejar los cambios
        }
    } catch (error) {
        console.error("Error en la solicitud de eliminación:", error);
        alert("Hubo un error al eliminar la canción.");
    }
});
