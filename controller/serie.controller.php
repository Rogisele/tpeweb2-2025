<?php

require_once './model/serie.model.php';
require_once './view/serie.view.php';

class SerieController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new SerieModel();
        $this->view = new SerieView();
    }

    // Mostrar todas las categorías
    public function showSeries() {
        $seasons = $this->model->getAllseasons();
        $this->view->showSeries($seasons);
    }

    // Agregar una nueva categoría
    public function addSeason($request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $imagen = $_FILES['imagen']['name'];
            $ruta = 'categories/' . basename($imagen);
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

            $this->model->insertSeason($nombre, $ruta);
            header('Location: ' . BASE_URL . 'temporada');
        }
    }

    // Eliminar categoría
    public function deleteSerie($id) {
        $this->model->removeSeason($id);
        header('Location: ' . BASE_URL . 'temporada');
    }

    // Editar categoría
    public function updateSerie($request, $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['Nombre'];
            $imagen = $_FILES['Imagen']['name'];
            

            $this->model->updateSeason($id, $nombre, );
            header('Location: ' . BASE_URL . 'temporada');
        }
    }
}

