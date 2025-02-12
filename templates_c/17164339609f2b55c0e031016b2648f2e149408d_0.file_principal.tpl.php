<?php
/* Smarty version 5.4.0, created on 2025-02-12 00:53:21
  from 'file:principal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67abe2f155a8d9_24974625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17164339609f2b55c0e031016b2648f2e149408d' => 
    array (
      0 => 'principal.tpl',
      1 => 1738974793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67abe2f155a8d9_24974625 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\FinalPhp\\MusicServiceWeb\\templates';
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
            <input type="text" id="list-name" name="nombre" required>
            <input type="hidden" id="usuario-id" name="usuario_id" value="<?php echo $_smarty_tpl->getValue('usuario')['id'];?>
">
            <input type="hidden" id="es_publica" name="es_publica" value="false">
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
         <button id="Cuenta" onclick="window.location.href='/home/<?php echo $_smarty_tpl->getValue('usuario')['id'];?>
/cuenta'">Cuenta</button>
        </ul>
    </aside>
    <section>
        <div class="User"> <span class="material-symbols-outlined">
            person
            </span>
            <h1><?php echo $_smarty_tpl->getValue('usuario')['name'];?>
</h1>
        </div>
        <div id="list-content" class="listas-container">
            <?php if ((null !== ($_smarty_tpl->getValue('listas') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('listas')) > 0) {?>
            <h1>Listas</h1>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('listas'), 'lista');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('lista')->value) {
$foreach0DoElse = false;
?>
              
              <button class="listas" onclick="window.location.href='/home/<?php echo $_smarty_tpl->getValue('usuario')['id'];?>
/lista/<?php echo $_smarty_tpl->getValue('lista')['id'];?>
'">
                <span class="material-symbols-outlined">music_note</span>
                <p><?php echo $_smarty_tpl->getValue('lista')['nombre'];?>
</p>
              </button>
 
              
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          <?php } else { ?>
             <h1>Sin listas</h1>
          <?php }?>
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
