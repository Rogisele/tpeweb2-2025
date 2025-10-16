<?php

require_once './model/season.model.php';
require_once './view/season.view.php';

class SeasonController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new SerieModel();
        $this->view = new SerieView();
    }

    // Mostrar todas las categorías
    public function showSeason() {
        $seasons = $this->model->getAllseasons();
        $this->view->showSeasons($seasons);
    }

    // Agregar una nueva categoría
    public function addSeason($request) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Name = $_POST['nombre'];
            $premiere_date = $_POST['Fecha_estreno'];
            $Producer = $_POST['Productora'];
            $image = $_FILES['imagen']['name'];
            $ruta = 'categories/' . basename($image);
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

            $this->model->insertSeason($Name, $premiere_date, $Producer, $image);
            header('Location: ' . BASE_URL . 'temporada');
        }
    }

    // Eliminar categoría
    public function deleteSeason($id) {
        $this->model->removeSeason($id);
        header('Location: ' . BASE_URL . 'temporada');
    }

    // Editar categoría
    public function updateSerie($Name, $premiere_date, $Producer, $image) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['Nombre'];
            $imagen = $_FILES['Imagen']['name'];
            

            $this->model->updateSeason($$Name, $premiere_date, $Producer, $image);
            header('Location: ' . BASE_URL . 'temporada');
        }
    }
}

