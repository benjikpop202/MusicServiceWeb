<!DOCTYPE html>
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
        <form id="list-form" action="index.php?action=crearLista" method="post">
            <label for="list-name">Ingrese nombre de la Lista</label>
            <input type="text" id="list-name" name="nombre" required>
            <input type="hidden" name="usuario_id" value={$usuario['id']}>
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
         <button id="Cuenta" onclick="window.location.href='/cuenta'">Cuenta</button>
        </ul>
    </aside>
    <section>
        <div class="User"> <span class="material-symbols-outlined">
            person
            </span>
            <h1>{$usuario['name']}</h1>
        </div>
        <div id="list-content" class="listas-container">
          <h1>Listas</h1>
        </div>
        <div id="btn-section">
            <button id="anterior"> < Anterior </button>
            <button id="siguiente"> Siguiente > </button>
        </div>
    </section>
    <script src="/templates/scripts/paginacion.js" type="text/javascript"></script>
</body>
</html>
