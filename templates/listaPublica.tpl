<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$lista.nombre} - Music Service</title>
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/templates/styles/listaPublica.css"/>
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1 id="nombreLista">Lista {$lista.nombre}</h1>
        </div>
        <div class="content">
                {if isset($canciones) && $canciones|@count > 0}
            {foreach from=$canciones item=cancion}
                <button class="cancion" data-nombre="{$cancion.nombre}" 
                data-artista="{$cancion.artista}" 
                data-genero="{$cancion.genero}">
                    <span class="material-symbols-outlined">music_note</span>
                    <p>{$cancion.nombre}</p>
                </button>
            {/foreach}
            <div id="btn-section">
                <button id="anterior"> < Anterior </button>
                <button id="siguiente"> Siguiente > </button>
            </div>
            </div>
          {else}
             <p>Sin canciones</p>
          {/if}
        </div>
    </div>
    <div id="overlay">
        <div class="overlay-content">
            <h2 id="overlay-nombre"></h2>
            <p><strong>Artista:</strong> <span id="overlay-artista"></span></p>
            <p><strong>Género:</strong> <span id="overlay-genero"></span></p>
            <button id="cerrar-overlay">Cerrar</button>
        </div>
    </div>
    <script src="/templates/scripts/listaPublica.js"></script>
</body>
</html>