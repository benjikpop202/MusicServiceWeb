<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$lista.nombre} - Music Service</title>
    <link rel="stylesheet" href="/templates/styles/principal.css"/>
    <link rel="stylesheet" href="/templates/styles/lista.css"/>
</head>
<body>
   
<!-- Formulario para agregar canciones (Inicialmente oculto) -->
<div id="overlay-cancion" class="overlay" style="display: none;">
    <form id="form-Cancion" class="overlay-content">
        <label for="nombreCancion">Nombre de la Canción:</label><br>
        <input type="text" id="nombreCancion" placeholder="Ingrese el nombre" required>
        <label for="artistaCancion">Artista:</label><br>
        <input type="text" id="artistaCancion" placeholder="Ingrese el artista" required>
        <label for="generoCancion">Género:</label><br>
        <input type="text" id="generoCancion" placeholder="Ingrese el género" required>
        <button type="submit" id="guardarCancion">Agregar</button>
        <button type="button" id="btnCancelar">Cancelar</button>
    </form>
</div>

<!-- Lista de canciones -->
<div id="listaCanciones">
    <h2>Listado de Canciones</h2>
    <ul id="canciones">
        <!-- Aquí se irán agregando las canciones -->
    </ul>
</div>

        <div class="title-container">
            <h1 id="nombreLista">Canciones {$lista.nombre}</h1>
            {if isset($canciones) && $canciones|@count > 0}
            <div class="content">
            {foreach from=$listas item=lista}
                <div class="cancion" >
                    <span class="material-symbols-outlined">music_note</span>
                    <p>{$cancion.nombre}</p>
                </div>
            {/foreach}
            </div>
          {else}
             <p>Sin canciones</p>
          {/if}
        </div>
        <div class="content">
            <div class="sidebar">
                <button class="action-button edit-button" id="update-btn">Editar lista</button>
                
              <button class="action-button delete-button" id="btnEliminarLista">
                Eliminar lista
                <input type="hidden" id="usuario-id" name="usuario_id" value="{$lista.usuario_id}">
                </button>
                <button class="action-button add-button" id="agregarCancionBtn" data-lista-id="{$lista.id}" data-user-id="{$usuario.id}">Agregar canciones</button>

                {if $usuario.status == 'premium'}
                  <button class="action-button" id='publicLista'>
                    <input type="hidden" id="public" value="{$lista.es_publica}">
                    Publicar lista
                  </button>
                {/if}
            </div>
        </div>
    </div>

    <!-- Overlay para Actualizar Lista -->
    <div id="overlay">
        <div class="overlay-content">
            <h3>Editar Lista</h3>
            <input type="hidden" id="listaId" value="{$lista.id}">
            <input type="text" id="nuevoNombre" placeholder="Nuevo nombre de la lista" value="{$lista.nombre}">
            <button id="btnActualizarLista">Guardar</button>
            <button onclick="document.getElementById('overlay').style.display='none'">Cancelar</button>
        </div>
    </div>

    <script src="/templates/scripts/lista.js"></script>
    
</body>
</html>  









