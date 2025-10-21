<?php

class SeasonView {
    public function showSeasons($seasons, $user = null) {
        $title = "Temporadas";
        require './templates/seasons.phtml'; // Vista principal con listado y formulario
    }
    public function showError($error, $user = null) {
        echo "<h1>Error: $error</h1>";
    }
}
?>
