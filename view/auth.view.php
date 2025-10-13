<<<<<<< HEAD
<?php


class AuthView {

    public function showLogin($error, $user) {
        require_once './templates/form.login.phtml';
    }

   public function showError($error){
        require 'templates/error.phtml';
    }
}
=======
<?php


class AuthView {

    public function showLogin($error, $user) {
        require_once './templates/form.login.phtml';
    }

   public function showError($error){
        require 'templates/error.phtml';
    }
}
>>>>>>> 85e377fb6f6f34256474223ed6f6df8e3a19c421
?>