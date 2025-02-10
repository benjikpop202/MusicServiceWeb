<?php
/* Smarty version 5.4.0, created on 2025-02-10 22:25:20
  from 'file:lista.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67aa6ec053a7f7_77580432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b615cf7308e63c92fb3eab629f2e8779fbec46b' => 
    array (
      0 => 'lista.tpl',
      1 => 1739221345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67aa6ec053a7f7_77580432 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\FinalPhp\\MusicServiceWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->getValue('lista')['nombre'];?>
 - Music Service</title>
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
    <link rel="stylesheet" href="/templates/styles/lista.css"/>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Lista <?php echo $_smarty_tpl->getValue('lista')['nombre'];?>
</h1>
        </div>
        <div class="content">
            <div class="sidebar">
                <button class="action-button edit-button">Editar lista</button>
                <button class="action-button delete-button">Eliminar lista</button>
                <button class="action-button add-button">Agregar canciones</button>
            </div>
        </div>
    </div>
</body>
</html>


<?php }
}
