<?php
/* Smarty version 5.4.0, created on 2025-01-27 23:06:05
  from 'file:templates/cuenta.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6798034d791a81_91377702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8217ddcf0deebb93dc77a7212c650979f2e7504c' => 
    array (
      0 => 'templates/cuenta.tpl',
      1 => 1738015323,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6798034d791a81_91377702 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\TrabajoFinalPhp\\MusicServiceWeb\\templates';
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
        <h1>Bienvenido, cebu</h1>
    </header>
    <main id="account-container">
        <section id="user-info">
            <h2>Detalles de tu cuenta</h2>
            <p><strong>Nombre:</strong> cebu</p>
            <p><strong>Email:</strong> cebu@gmail.com</p>
            <p><strong>Estado:</strong> Free</p>
        </section>
        <div id="action-buttons">
            <form action="/cuenta/actualizar" method="post">
                <input type="hidden" name="id" value="cebu">
                <button type="submit" id="update-btn">Actualizar Datos</button>
            </form>
            <form action="/cuenta/eliminar" method="post" onsubmit="return confirm('¿Estás seguro de eliminar tu cuenta?')">
                <input type="hidden" name="id" value="cebu">
                <button type="submit" id="delete-btn">Eliminar Cuenta</button>
            </form>
        </div>
    </main>
</body>
</html>


<?php }
}
