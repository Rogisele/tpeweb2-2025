<?php

class SerieView{
    
    public function ShowSeasons($seasons){
        require './templates/list-Temporadas.phtml';
    }    
    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
    public function showFormEditSeason($id){
        require './templates/formeditseason.phtml';
    }
}
?>