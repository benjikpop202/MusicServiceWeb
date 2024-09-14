<?php
/* Smarty version 5.4.0, created on 2024-09-14 16:34:55
  from 'file:registrarse.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66e59f0f6df2e2_47187145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd65405bacc0d99746122f81967e84e93b79675d0' => 
    array (
      0 => 'registrarse.tpl',
      1 => 1726324457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66e59f0f6df2e2_47187145 (\Smarty\Template $_smarty_tpl) {
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
    <style>
        .material-symbols-outlined {
            font-size: 3.5rem;
        }
            
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            background-size: cover;
        }
        aside {
            width: 30%;
        }
        aside p {
            color: gray;
            font-size: 1.5rem;
        }
        aside button {
            padding: 10px;
            border: none;
            background-color: blueviolet;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        section {
            display: flex;
            width: 60%;
            flex-direction: column;
        }
        .Title {
            display: flex;
            align-items: center;
            margin-bottom: 10%;
        }
        .login-container {
            margin-left: 5%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
       .Title h1 {
            font-family: "Poppins", sans-serif;
            font-style: normal;
            margin-bottom: 20px;
            font-size: 3.5rem;
            font-weight: bolder;
            text-align: center;
            background: linear-gradient(90deg, indigo, blueviolet, violet, pink);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;  
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: blueviolet;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <aside>
        <p>¿Ya tienes una cuenta?</p>
        <button onclick="window.location.href='login.php'">Iniciar Sesión</button>
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
</html>
<?php }
}
