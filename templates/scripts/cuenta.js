document.getElementById('update-btn').addEventListener('click', () => {
    document.getElementById('overlay').style.display = 'flex';
});

const form = document.getElementById('actualizar');
form.addEventListener('submit', async (e) => {
    e.preventDefault(); // Evita el envío tradicional del formulario

    const formData = new FormData(form);
    console.log("📤 Datos enviados:", [...formData.entries()]);

    // Eliminar el input de tarjeta antes de enviar
    let creditCardInput = document.getElementById('creditCardInput');
    if (creditCardInput) {
        creditCardInput.removeAttribute("name"); // Asegurar que no se envíe
    }

    try {
        const response = await fetch('http://localhost:8000/index.php?action=actualizarUsuario', {
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
        alert("Hubo un error al actualizar el usuario.");
    }
});

const FormDelete = document.getElementById("deleteForm")
FormDelete.addEventListener('submit', async (e) => {
    e.preventDefault(); 
    const id = document.getElementById("id").value
    try {
        const response = await fetch(`http://localhost:8000/index.php?action=eliminarUsuario&id=${id}`, {
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
            window.location.replace("/register");
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        alert("Hubo un error al eliminar el usuario.");
    }
});


