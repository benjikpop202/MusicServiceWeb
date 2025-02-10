<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="/templates/styles/cuenta.css"> <!-- Estilos para esta sección -->
</head>
<body>
    <header>
        <h1>Bienvenido {$usuario['name']}</h1>
    </header>
    <main id="account-container">
        <section id="user-info">
            <h2>Detalles de tu cuenta</h2>
            <p><strong>Nombre:</strong> {$usuario['name']}</p>
            <p><strong>Email:</strong> {$usuario['gmail']}</p>
            <p><strong>Estado:</strong> {$usuario['status']}</p>
        </section>
        <div id="action-buttons">
            <button id="update-btn">Actualizar Datos</button>
            <div id="overlay">
                <form id="actualizar">
                    <input type="hidden" name="id" value="{$usuario['id']}">
                    <label for="name">Nombre</label>
                    <input name="name" id="name" value="{$usuario['name']}">
                    <input type="hidden" name="status" id="statusField" value="{$usuario['status']}">
                     {if $usuario['status'] == 'premium'}
                     <button type="button" class="subscripcion" id="toggleSubscription" data-status="free">Cancelar suscripción</button>
                     {else}
                    <button type="button" class="subscripcion" id="toggleSubscription" data-status="premium">Suscribirse</button>
                     {/if}
                     <div id="creditCardField" style="display: none;">
                        <label>Número de tarjeta:</label>
                        <input type="text" placeholder="Ingrese su tarjeta">
                    </div>
                    <button id="submit" type="submit">Actualizar</button>
                </form>
            </div>
            <form id="deleteForm" onsubmit="return confirm('¿Estás seguro de eliminar tu cuenta?')">
                <input type="hidden" id="id" name="id" value="{$usuario['id']}">
                <button type="submit" id="delete-btn">Eliminar Cuenta</button>
            </form>
        </div>
    </main>
    <script>
        document.getElementById("toggleSubscription").addEventListener("click", function() {
            const statusField = document.getElementById("statusField");
            const currentStatus = statusField.value;
            
            if (currentStatus === "premium") {
                statusField.value = "free";
                this.textContent = "Suscribirse";
                document.getElementById("creditCardField").style.display = "none";
            } else {
                statusField.value = "premium";
                this.textContent = "Cancelar suscripción";
                document.getElementById("creditCardField").style.display = "block";
            }
        });
    </script>
    
    <script src="/templates/scripts/cuenta.js" type="text/javascript"></script>
</body>
</html>


