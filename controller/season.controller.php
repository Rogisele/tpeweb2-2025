<?php

require_once './model/season.model.php';
require_once './view/season.view.php';

class SeasonController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new SeasonModel();
        $this->view = new SeasonView();
    }

    // Mostrar todas las temporadas
    public function showSeason($request) {
        $seasons = $this->model->getAllSeasons();
        $this->view->showSeasons($seasons, $request->user ?? null);
    }

    // Agregar nueva temporada
    public function addSeason($request) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Capturar datos del formulario
        $Nombre = $_POST['Nombre'] ?? null;
        $Fecha_estreno = $_POST['Fecha_estreno'] ?? null;
        $Productora = $_POST['Productora'] ?? null;
        $imagen = $_POST['Imagen'] ?? null;

        // Validar que todos los campos estén completos
        if ( $Nombre && $Fecha_estreno && $Productora && $imagen) {
            try {
                $this->model->insertSeason($Nombre, $Fecha_estreno, $Productora, $imagen);
                header('Location: ' . BASE_URL . 'season');
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

    // Actualizar temporada existente
    public function updateSeason() {
        if(!empty($_POST)){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID_temporada  = $_POST['ID_temporada'];
            $Nombre = $_POST['Nombre'];
            $Fecha_estreno = $_POST['Fecha_estreno'];
            $Productora = $_POST['Productora'];
            $imagen = $_POST['Imagen'];

            if (!empty($Nombre) && !empty($Fecha_estreno) && !empty($Productora) && !empty($imagen)) {
                $this->model->updateSeason($ID_temporada, $Nombre, $Fecha_estreno, $Productora, $imagen);
            } else {
                $this->view->showError("Todos los campos son obligatorios");
                return;
            }
            header('Location: ' . BASE_URL . 'season');
            exit;
        }
        }
    }

    // Eliminar temporada
    public function deleteSeason($id) {
        $this->model->removeSeason($id);
        header('Location: ' . BASE_URL . 'season');
        exit;
    }
}