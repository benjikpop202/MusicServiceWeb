<?php
/* Smarty version 5.4.0, created on 2024-10-11 21:49:12
  from 'file:templates/registrarse.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_670981387d2290_48743489',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcbb134bf846115b156fdabccab6cdbaa559e0f9' => 
    array (
      0 => 'templates/registrarse.tpl',
      1 => 1728675801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670981387d2290_48743489 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicServiceWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="templates/styles/register.css"/>
</head>
<body>
    <aside>
        <p>¿Ya tienes una cuenta?</p>
        <button onclick="window.location.href='/login'">Iniciar Sesión</button>
    </aside>
    <section>
        <div class="Title">
            <h1>Registrarse</h1>
            <span class="material-symbols-outlined">person_add</span>
        </div>
        <div class="login-container">
            <form action="index.php?action=registrarse" method="post">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="gmail">Correo Electrónico:</label>
                    <input type="email" id="gmail" name="gmail" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="status">Estado:</label>
                    <input type="text" id="status" name="status" required>
                </div>
                <div class="form-group">
                    <button type="submit">Registrarse</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html><?php }
}
