<?php
/* Smarty version 5.4.0, created on 2024-10-11 03:37:15
  from 'file:templates/sesion.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6708814b3b8cd1_59513273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab5b254463a00636684a31ac217cc5a45d8b4b45' => 
    array (
      0 => 'templates/sesion.tpl',
      1 => 1728610034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6708814b3b8cd1_59513273 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicServiceWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="templates/styles/sesion.css"/>
</head>
<body>
    <aside>
        <p>¿No tienes una cuenta?</p>
        <button onclick="window.location.href='/register'">Registrarse</button>
    </aside>
    <section>
        <div class="Title"><h1>Music Service</h1> <span class="material-symbols-outlined">
            music_note
            </span></div>
        <div class="login-container">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
<?php }
}
