<?php
require_once './app-serie/models/chapters.model.php';
require_once './app-serie/views/chapters.view.php';



class ChaptersController{
    private $model;
    private $view;
    
    
    function __construct(){
       $this-> model= new ChaptersModel();
       $this-> view= new ChaptersView();
       
    }

    function listChapters($request){
        // pido los capitulos al modelo

        $chapters = $this-> model-> getAllchapters();

        //se las envio a la vista

        $this->view->listChapters($chapters,$request->user);
    }

    function addChapter($request){
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            return $this->view->showError('Error: falta completar el titulo', $request->user);
        }

        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripcion');
        }

        // obtengo los datos del formulario
        $title = $_POST['title'];
        $description = $_POST['description'];
        

        $id = $this->model->insert($title, $description);

        if (!$id) {
            return $this->view->showError('Error al insertar capitulo', $request->user);
        } 

        // redirijo al home
        header('Location: ' . BASE_URL);


    }

     public function deleteChapter($request) {
        // obtengo la tarea que quiero eliminar
        $chapter = $this->model->getChapter($request->id);

        if (!$chapter) {
            return $this->view->showError("No existe la tarea con el id=$request->id", $request->user);
        }

        $this->model->removeChapter($request->id);

        // redirijo al home
        header('Location: ' . BASE_URL);
    }

    public function updateChapter($request,$id) {
        $chapter = $this->model->getChapter($id);

        if (!$chapter) {
            return $this->view->showError("No existe el capitulo");
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Si el formulario ha sido enviado
            if (empty($_POST['Titulo'])) {
                return $this->view->showError('Por favor ingrese el título');
            }
            if (empty($_POST['Descripcion'])) {
                return $this->view->showError('Por favor ingrese la descripcion');
            }
             
            //Obtengo los nuevos valores
            $titulo = $_POST['Titulo'];
            $descripcion = $_POST['Descripcion'];
            $serie = $_POST['ID_serie'];

            $this->model->finalizeChapter($titulo,$descripcion,$serie,$request->$id);

            header('Location: ' . BASE_URL . 'list-chapters');
        }
    }


}








?>
