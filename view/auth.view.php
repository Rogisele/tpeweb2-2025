<?php

class AuthView {

    public function showLogin($error, $user) {
        $title = "Registro";
        require_once './templates/form.login.phtml';
    }

   public function showError($error){
        require 'templates/error.phtml';
    }
}
?>