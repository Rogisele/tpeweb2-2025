<?php

class ChaptersView{

    public function listChapters($chapters, $seasons){
        
        require './templates/list-chapters.phtml';

    }
    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }
}
?>

