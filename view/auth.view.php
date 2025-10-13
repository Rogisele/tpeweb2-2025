<?php


class AuthView {

    public function showLogin($error, $user) {
        require_once './templates/form.login.phtml';
    }

   public function showError($error){
        require 'templates/error.phtml';
    }
}
?>