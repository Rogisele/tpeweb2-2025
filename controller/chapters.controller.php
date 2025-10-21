<?php

require_once './model/chapters.model.php';
require_once './view/chapters.view.php';
require_once './model/season.model.php';


class ChaptersController{
    private $model;
    private $view;
    private $SeasonModel;
    
    function __construct(){
       $this-> model= new ChaptersModel();
       $this-> view= new ChaptersView();
       $this-> SeasonModel = new SeasonModel();
    }
    
    function home($request) {
    $seasons = $this->SeasonModel->getAllSeasons();
    $seasonId = $_GET['season_id'] ?? ($seasons[0]->ID_serie ?? null);
    $chapters = $seasonId ? $this->model->chaptersBySeason($seasonId) : [];
    $this->view->home($chapters, $seasons, $request->user);
}
    
    function listChapters($request){
        // pido los capitulos al modelo
        $seasons = $this->SeasonModel->getAllSeasons();
        $seasonId = $_GET['season_id'] ?? ($seasons[0]->ID_serie ?? null);
        $chapters = $this-> model-> getAllchapters();
        
        //se las envio a la vista
        $this->view->listChapters($chapters,$seasons,$request->user);
    }
    function ShowChapter($id){
        $chapter=$this-> model-> getChapter($id);
        $this->view->ShowChapter($chapter);
        
    }

    function addChapter($request){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Titulo = $_POST['Titulo'] ?? null;
            $Descripcion = $_POST['Descripcion'] ?? null;
            $ID_serie_fk = $_POST['ID_temporada_fk'] ?? null;
        

        // Validar que todos los campos estén completos
        if ( $Titulo && $Descripcion && $ID_serie_fk  ) {
            try {
                $this->model->insertChapter($Titulo, $Descripcion,$ID_serie_fk);
                header('Location: ' . BASE_URL . 'chapters');
                exit;
            } catch (PDOException $e) {
                $this->view->showError("Error al insertar: " . $e->getMessage(), $request->user);
            }
        } else {
            $this->view->showError("Todos los campos son obligatorios", $request->user);
        }
        } else {
            $this->view->showError("Método no permitido", $request->user);
        }

    } 
        public function updateChapter() {
            if(!empty($_POST)){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID_capitulos = $_POST['ID_capitulos'];
            $Titulo = $_POST['Titulo'];
            $Descripcion = $_POST['Descripcion'];
            $ID_serie_fk=$_POST['ID_temporada_fk'];
             if (!empty($Titulo) && !empty($Descripcion)  && !empty($ID_serie_fk)) {
                $this->model->updateChapter($ID_capitulos,$Titulo, $Descripcion,$ID_serie_fk);
            } else {
                $this->view->showError("Todos los campos son obligatorios");
                return;
            }
            header('Location: ' . BASE_URL . 'chapters');
            exit;
            }
            }

    }  
     public function deleteChapter($id) {
        $this->model->removeChapter($id);
        header('Location: ' . BASE_URL . 'chapters');
            exit;
    }




}








?>

