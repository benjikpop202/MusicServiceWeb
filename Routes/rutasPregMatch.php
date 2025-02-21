<?php

// Ruta para la página principal del usuario
if (preg_match('/^\/home\/(\d+)$/', $request, $matches)) {
    $userId = $matches[1];

    // Obtener los datos del usuario desde la base de datos
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener todas las listas del usuario
    $queryListas = "SELECT * FROM listas WHERE usuario_id = :id";
    $stmtListas = $db->prepare($queryListas);
    $stmtListas->bindParam(':id', $userId);
    $stmtListas->execute();
    $listas = $stmtListas->fetchAll(PDO::FETCH_ASSOC);

    // Pasar los datos del usuario y las listas a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->assign('listas', $listas);
    $smarty->display('principal.tpl');
    exit();
}

// Ruta para la cuenta del usuario
if (preg_match('/^\/home\/(\d+)\/cuenta$/', $request, $matches)) {
    $userId = $matches[1];

    // Obtener los datos del usuario desde la base de datos
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Pasar los datos del usuario a la plantilla Smarty
    $smarty->assign('usuario', $usuario);
    $smarty->display('cuenta.tpl');
    exit();
}

// Ruta para mostrar una lista específica
if (preg_match('/^\/home\/(\d+)\/lista\/(\d+)$/', $request, $matches)) {
    $userId = $matches[1];
    $listaId = $matches[2];

    // Obtener los datos de la lista desde la base de datos
    $query = "SELECT * FROM listas WHERE id = :listaId AND usuario_id = :userId";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':listaId', $listaId);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $lista = $stmt->fetch(PDO::FETCH_ASSOC);

    $query2 = "SELECT * FROM usuarios WHERE id = :userId";
    $stmt2 = $db->prepare($query2);
    $stmt2->bindParam('userId', $userId);
    $stmt2->execute();
    $user = $stmt2->fetch(PDO::FETCH_ASSOC);

    $query3 = "SELECT c.id, c.nombre, c.artista, c.genero 
            FROM Canciones c
            JOIN CancionLista cl ON c.id = cl.cancion_id
            WHERE cl.lista_id = :lista_id";
    $stmt3 = $db->prepare($query3);
    $stmt3->bindParam('lista_id', $listaId);
    $stmt3->execute();
    $canciones = $stmt3->fetchAll(PDO::FETCH_ASSOC);


    if ($lista && $user) {
        // Pasar los datos de la lista a la plantilla Smarty
        $smarty->assign('usuario', $user);
        $smarty->assign('lista', $lista);
        $smarty->assign('canciones', $canciones);
        $smarty->display('lista.tpl');
    } else {
        http_response_code(404);
        echo "Lista no encontrada.";
    }
    exit();
}
// Ruta para obtener una canción específica de una lista
if (preg_match('/^\/home\/(\d+)\/lista\/(\d+)\/cancion\/(\d+)$/', $request, $matches)) {
    $userId = $matches[1];
    $listaId = $matches[2];
    $cancionId = $matches[3];
    
    $query = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    // Verificar que la lista pertenece al usuario
    $query2 = "SELECT * FROM listas WHERE id = :listaId AND usuario_id = :userId";
    $stmt2 = $db->prepare($query2);
    $stmt2->bindParam(':listaId', $listaId);
    $stmt2->bindParam(':userId', $userId);
    $stmt2->execute();
    $lista = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($lista) {
        // Obtener la canción específica
        $queryCancion = "SELECT c.* FROM Canciones c 
                         INNER JOIN CancionLista cl ON c.id = cl.cancion_id 
                         WHERE cl.lista_id = :listaId AND c.id = :cancionId";
        $stmtCancion = $db->prepare($queryCancion);
        $stmtCancion->bindParam(':listaId', $listaId);
        $stmtCancion->bindParam(':cancionId', $cancionId);
        $stmtCancion->execute();
        $cancion = $stmtCancion->fetch(PDO::FETCH_ASSOC);

        if ($cancion) {
            // Pasar la canción a la plantilla Smarty
            $smarty->assign('usuario', $usuario);
            $smarty->assign('lista', $lista);
            $smarty->assign('cancion', $cancion);
            $smarty->display('cancion.tpl');
        } else {
            http_response_code(404);
            echo "Canción no encontrada.";
        }
    } else {
        http_response_code(404);
        echo "Lista no encontrada.";
    }
    exit();
}


if (preg_match('/^\/plataforma\/(\d+)$/', $request, $matches)) {
    $listaId = $matches[1];
    $query = "SELECT * FROM listas WHERE id = :listaId ";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':listaId', $listaId);
    $stmt->execute();
    $lista = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($lista) {

        $query2 = "SELECT c.id, c.nombre, c.artista, c.genero 
            FROM Canciones c
            JOIN CancionLista cl ON c.id = cl.cancion_id
            WHERE cl.lista_id = :lista_id ";
        $stmt2 = $db->prepare($query2);
        $stmt2->bindParam(':lista_id', $listaId, PDO::PARAM_INT);
        $stmt2->execute();
        $canciones = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $smarty->assign("canciones", $canciones);
        $smarty->assign("lista", $lista);
        $smarty->display('listaPublica.tpl');
    } else {
        http_response_code(404);
        echo "Lista no encontrada.";
    }
    exit();
}

// Otras rutas definidas
if (preg_match('/^\/home\/(\d+)\/listas$/', $request, $matches)) {
    // Lógica para obtener listas de un usuario
} 

// Rutas o lógica genérica
/*else {
    http_response_code(404);
    echo "Página no encontrada.";
}*/


