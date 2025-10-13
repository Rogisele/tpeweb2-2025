<<<<<<< HEAD
<?php
require_once './app-serie/models/users.model.php';
require_once './app-serie/views/auth.view.php';

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
        if(empty($_POST['user']) || empty($_POST['password'])) {
            return $this->view->showLogin("Faltan datos obligatorios", $request->user);
        }

        $user = $_POST['user'];
        $password = $_POST['password'];

        $userFromDB = $this->userModel->getByUser($user);

        if($userFromDB && password_verify($password, $userFromDB->contraseña)) {
            $_SESSION['USER_ID'] = $userFromDB->id;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            header("Location: ".BASE_URL."list-chapter");
            return;
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
=======
<?php
require_once './app-serie/models/users.model.php';
require_once './app-serie/views/auth.view.php';

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
        if(empty($_POST['user']) || empty($_POST['password'])) {
            return $this->view->showLogin("Faltan datos obligatorios", $request->user);
        }

        $user = $_POST['user'];
        $password = $_POST['password'];

        $userFromDB = $this->userModel->getByUser($user);

        if($userFromDB && password_verify($password, $userFromDB->contraseña)) {
            $_SESSION['USER_ID'] = $userFromDB->id;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            header("Location: ".BASE_URL."list-chapter");
            return;
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
>>>>>>> 85e377fb6f6f34256474223ed6f6df8e3a19c421
