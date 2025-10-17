<?php

class SerieView{
    
    public function ShowSeasons($seasons, $user){
        $title = "Temporadas";
        require './templates/list-seasons.phtml';
    }    
    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
    public function showFormEditSeason($id){
        require './templates/formeditseason.phtml';
    }
}
?>