<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Plataforma Music Service</title>
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
    <link rel="stylesheet" href="/templates/styles/lista.css"/>
    <link rel="stylesheet" href="/templates/styles/plataforma.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Plataforma</h1>
        </div>
        {if isset($listas) && $listas|@count > 0}
            <div class="content">
            {foreach from=$listas item=lista}
                <div class="lista" onclick="window.location.href='/plataforma/{$lista.id}'">
                    <span class="material-symbols-outlined">music_note</span>
                    <p>{$lista.nombre}</p>
                </div>
            {/foreach}
            </div>
          {else}
             <h1>Sin listas</h1>
          {/if}
    </div>
</body>
</html>