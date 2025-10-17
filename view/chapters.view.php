<?php

class ChaptersView{

    public function listChapters($chapters, $seasons, $user){
        $title = "Capitulos";
        require './templates/list-chapters.phtml';

    }
    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}
?>

