<?php
class ChaptersView{





    public function listChapters($request){
        
        require './templates/list-chapters.phtml';

    }
    

    public function showError($error, $user) {
        echo "<h1>$error</h1>";
    }

  
    
    }

    


?>

