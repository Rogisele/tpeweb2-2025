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



session_start();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'list-chapters'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);


switch ($params[0]) {
    case 'list-chapters':
        $controller = new ChaptersController();
        $controller->listChapters($request);
        break;
    case 'showSeasons':
        $controller = new SeasonController();
        $controller->showSeason();
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
        $controller->updateChapter($request);// me marca error en este parametro
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do-login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller ->logout($request);
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
