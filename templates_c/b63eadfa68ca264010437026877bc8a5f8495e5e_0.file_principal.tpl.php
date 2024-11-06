<?php
/* Smarty version 5.4.0, created on 2024-11-06 00:20:01
  from 'file:templates/principal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_672aa821971283_19943189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b63eadfa68ca264010437026877bc8a5f8495e5e' => 
    array (
      0 => 'templates/principal.tpl',
      1 => 1730848793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672aa821971283_19943189 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\MusicService\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Music Service</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
</head>
<body>
    <div id="overlay">
        <form id="list-form">
            <label for="list-name">Ingrese nombre de la Lista</label>
            <input type="text" id="list-name" required>
            
            <button id="submit" type="submit">Agregar</button>
            <button type="button" id="cancelar">Cancelar</button>
        </form>
    </div>
    <aside>
        <div class="Title"><h1>Music Service</h1> <span class="material-symbols-outlined">
            music_note
            </span>
        </div>
        <ul>
         <button id="NewLista">+ Nueva lista</button>
         <button>Plataforma</button>
         <button>Cuenta</button>
        </ul>
    </aside>
    <section>
        <div class="User"> <span class="material-symbols-outlined">
            person
            </span>
            <h1>User Name</h1>
        </div>
        <div id="list-content" class="listas-container">
          <h1>Listas</h1>
        </div>
        <div id="btn-section">
            <button id="anterior"> < Anterior </button>
            <button id="siguiente"> Siguiente > </button>
        </div>
    </section>
    <?php echo '<script'; ?>
 src="/templates/scripts/paginacion.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
