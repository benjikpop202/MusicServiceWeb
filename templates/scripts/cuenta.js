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
            if (data.success) {
                console.log("✅ Cuenta actualizada:", data.message);
                alert(data.message);
            } else {
                console.error("❌ Error:", data.message);
                alert(data.message);
            }
        } catch (error) {
            console.error("⚠️ Error en la petición:", error);
            alert("Hubo un problema al actualizar la cuenta.");
        }
    });

