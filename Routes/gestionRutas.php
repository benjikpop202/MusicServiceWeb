<?php
// Gestión de las rutas restantes
switch ($request) {
    case '/':
        $smarty->display('sesion.tpl');
        break;
    case '/cuenta':
        $smarty->display('cuenta.tpl');
        break;
    case '/plataforma':
        $query = "SELECT * FROM listas WHERE es_publica = true";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $listas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($listas) {
            $smarty->assign("listas", $listas);
            $smarty->display('plataforma.tpl');
        }
        break;
    case '/register':
        $smarty->display('registrarse.tpl');
        break;
    // Redirigir las acciones del usuario a funcionalidadesUser.php
    case (preg_match('/^\/user\//', $request) ? true : false):
        include_once(__DIR__ . '/FunctionController/funcionalidadesUser.php');
        break;
    // Redirigir las acciones relacionadas con listas a funcionalidadesLista.php
    case (preg_match('/^\/listas\//', $request) ? true : false):
        include_once(__DIR__ . '/FunctionController/funcionalidadesLista.php');
        break;
    case (preg_match('/^\/canciones\//', $request) ? true : false):
        include_once(__DIR__ . '/FunctionController/funcionalidadesCanciones.php');
        break;
}

