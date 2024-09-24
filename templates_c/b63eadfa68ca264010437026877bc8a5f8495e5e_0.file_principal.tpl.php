<?php
/* Smarty version 5.4.0, created on 2024-09-24 21:56:49
  from 'file:templates/principal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66f31981af1af7_31826567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b63eadfa68ca264010437026877bc8a5f8495e5e' => 
    array (
      0 => 'templates/principal.tpl',
      1 => 1727207805,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f31981af1af7_31826567 (\Smarty\Template $_smarty_tpl) {
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
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            background-size: cover;
        }
        aside{
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-arround;
        }
        .Title{
            display: flex;
            align-items: center;
            margin-bottom: 10%;
        }
        .Title h1 {
            font-family: "Poppins", sans-serif;
            font-style: normal;
            margin-bottom: 20px;
            font-size: 2.5rem;
            font-weight: bolder;
            text-align: center;
            background: linear-gradient(90deg, indigo, blueviolet, violet, pink);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;  
        }

        ul{
            display: flex;
            width: 80%;
            height: 500px;
            flex-direction: column;
        }
        ul button{
            margin: 30px;
            padding: 25px;
            background: #f1438d;
            color: #fff;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: width 0.3s;
            width: 70%;
        }
        ul button:hover{
           width: 90%;
        }
    </style>
</head>
<body>
    <aside>
        <div class="Title"><h1>Music Service</h1> <span class="material-symbols-outlined">
            music_note
            </span>
        </div>
        <ul>
         <button>+ Nueva lista</button>
         <button>Plataforma</button>
         <button>Cuenta</button>
        </ul>
    </aside>
</body>
</html>
<?php }
}
