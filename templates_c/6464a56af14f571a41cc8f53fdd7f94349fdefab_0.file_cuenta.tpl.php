<?php
/* Smarty version 5.4.0, created on 2025-02-08 19:01:24
  from 'file:templates/cuenta.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a79bf445f192_35761261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6464a56af14f571a41cc8f53fdd7f94349fdefab' => 
    array (
      0 => 'templates/cuenta.tpl',
      1 => 1739037501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a79bf445f192_35761261 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicServiceWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="/templates/styles/cuenta.css"> <!-- Estilos para esta sección -->
</head>
<body>
    <header>
        <h1>Bienvenido <?php echo $_smarty_tpl->getValue('usuario')['name'];?>
</h1>
    </header>
    <main id="account-container">
        <section id="user-info">
            <h2>Detalles de tu cuenta</h2>
            <p><strong>Nombre:</strong> <?php echo $_smarty_tpl->getValue('usuario')['name'];?>
</p>
            <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('usuario')['gmail'];?>
</p>
            <p><strong>Estado:</strong> <?php echo $_smarty_tpl->getValue('usuario')['status'];?>
</p>
        </section>
        <div id="action-buttons">
            <button id="update-btn">Actualizar Datos</button>
            <div id="overlay">
                <form id="actualizar">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('usuario')['id'];?>
">
                    <label for="name">Nombre</label>
                    <input name="name" id="name" value="<?php echo $_smarty_tpl->getValue('usuario')['name'];?>
">
                    <input type="hidden" name="status" id="statusField" value="<?php echo $_smarty_tpl->getValue('usuario')['status'];?>
">
                     <?php if ($_smarty_tpl->getValue('usuario')['status'] == 'premium') {?>
                     <button type="button" class="subscripcion" id="toggleSubscription" data-status="free">Cancelar suscripción</button>
                     <?php } else { ?>
                    <button type="button" class="subscripcion" id="toggleSubscription" data-status="premium">Suscribirse</button>
                     <?php }?>
                     <div id="creditCardField" style="display: none;">
                        <label>Número de tarjeta:</label>
                        <input type="text" placeholder="Ingrese su tarjeta">
                    </div>
                    <button id="submit" type="submit">Actualizar</button>
                </form>
            </div>
            <form action="/cuenta/eliminar" method="post" onsubmit="return confirm('¿Estás seguro de eliminar tu cuenta?')">
                <input type="hidden" name="id" value="cebu">
                <button type="submit" id="delete-btn">Eliminar Cuenta</button>
            </form>
        </div>
    </main>
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
 src="/templates/scripts/cuenta.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html>


<?php }
}
