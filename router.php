<?php
require_once './controller/chapters.controller.php';
require_once './controller/season.controller.php';
require_once './controller/auth.controller.php';
require_once './middlewares/guard.middleware.php';
require_once './middlewares/session.middleware.php';
 
 

/** TABLA DE RUTEO
 * 
 * list-chapters         ->     ChaptersController->listChapters()
 * chapter/:ID             ->     ChaptersController->chapter($id)
 * 
 *
 * login            ->     AuthController->showLogin()
 * new-chapter            ->     ChaptersController->addCharper();
 * delete-chapter/:ID     ->     ChaptersController->deleteChapter($id);
 * update-chapter/:ID    ->     ChaptersController->updateChapter($id);
 
 * 
 */





define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'list-chapters'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);
$ChaptersController = new ChaptersController();
$authCotroller= new AuthController();
$seasonController = new SeasonController();
$request = (new SessionMiddleware())->run($authCotroller);


switch ($params[0]) {
    case 'list-chapters':
        $controller = new ChaptersController();
        $controller->listChapters($request);
        break;
 case 'ShowChapter':
        $controller = new ChaptersController();
        $controller->ShowChapter($chapter);
        break;
    case 'list-season':
        $controller = new SeasonController();
        $controller->showSeason($request);
        break;
    case 'new-chapter':
        $request = (new GuardMiddleware())->run($request);
        $controller = new ChaptersController();
        $controller->addChapter($request);
        break;
    case 'delete-chapter':
        $request = (new GuardMiddleware())->run($request);
        $controller = new ChaptersController();
        $id = $params[1];
        $controller->deleteChapter($request);
        break;
    case 'update-chapter':
        $request = (new GuardMiddleware())->run($request);
       $controller = new ChaptersController();
        $id = $params[1];
        $controller->updateChapter($request, $id);// me marca error en este parametro
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
