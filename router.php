<?php

require_once './controller/chapters.controller.php';
require_once './controller/season.controller.php';
require_once './controller/auth.controller.php';
require_once './middlewares/guard.middleware.php';
require_once './middlewares/session.middleware.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);
$ChaptersController = new ChaptersController();
$authCotroller= new AuthController();
$seasonController = new SeasonController();
$request = (new SessionMiddleware())->run($authCotroller);


switch ($params[0]) {
    case 'home':
    $ChaptersController->home($request);
    break;
    case 'chapters':
        $controller = new ChaptersController();
        $controller->listChapters($request);
        break;
    case 'chapter':
        $controller = new ChaptersController();
        $controller->ShowChapter($params[1]);
        break;
    case 'season':
        $controller = new SeasonController();
        $controller->showSeason($request); // Siempre pasa la sesión
    break;
    case 'add-season':
        $controller = new SeasonController();
        $controller->addSeason($request); // ✅ minúscula
        break;
    case 'update-season':
        $controller = new SeasonController();
        if (isset($params[1])) {
            $controller->updateSeason($params[1]); // Guardar cambios
        }
        break;

    case 'delete-season':
        $controller = new SeasonController();
        if (isset($params[1])) {
            $controller->deleteSeason($params[1]); // Eliminar temporada
        }
        break;
    case 'new-chapter':
        $controller = new ChaptersController();
        $controller->addChapter($request);
        break;
    case 'delete-chapter':
        $controller = new ChaptersController();
        if (isset($params[1])) {
            $controller->deleteChapter($params[1]);
        }
            break;
    case 'update-chapter':
       $controller = new ChaptersController();
       if (isset($params[1])) {
        $id = $params[1];
        $controller->updateChapter($params[1]);
        }
        break;
    case 'login':
        $controller = $authCotroller;
        $controller->showLogin($request);
        break;
    case 'do-login':
        $controller = $authCotroller;
        $controller->doLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = $authCotroller;
        $controller ->logout($request);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
