<?php
require_once './model/users.model.php';
require_once './view/auth.view.php';

class AuthController {
    private $userModel;
    private $view;

    function __construct() {
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin($request) {
        $this->view->showLogin("", $request->user);
    }

    public function doLogin($request) {
    
        if(empty($_POST['Usuario']) || empty($_POST['contraseña'])) {
            return $this->view->showLogin("Faltan datos obligatorios", $request->user);
        }

        $user = $_POST['Usuario'];
        $password = $_POST['contraseña'];

        $userFromDB = $this->userModel->getByUser($user);
        
        if($userFromDB && password_verify($password, $userFromDB->contraseña)) {
            $_SESSION['USER_ID'] = $userFromDB->id;
            $_SESSION['USER_NAME'] = $userFromDB->Usuario;
            header("Location: ".BASE_URL."list-chapters");
        } else {
            return $this->view->showLogin("Usuario o contraseña incorrecta", $request->user);
        }
    }

    public function logout($request) {
        session_destroy();
        header("Location: ".BASE_URL."login");
        return;
    }


}
