<?php

class ChaptersView{

    public function listChapters($chapters, $seasons, $user){
        $title = "Capitulos";
        require './templates/chapters.phtml';

    }
    public function ShowChapter($chapter){
        $title = "Capitulo";

        require './templates/chapter.phtml';
    }
    

    
    public function showError($error) {
        echo "<h1>$error</h1>";
    }
    public function home($chapters, $seasons, $user){
        $title = "Inicio";
    require './templates/home.phtml';
}
}
?>

