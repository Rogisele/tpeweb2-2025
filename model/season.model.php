<?php

class SeasonModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', ''); 
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Obtener todas las temporadas
    public function getAllSeasons() {
        $query = $this->db->prepare('SELECT * FROM temporadas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener una temporada por ID
    public function getSeasonById($ID_temporada) {
    $query = $this->db->prepare('SELECT * FROM temporadas WHERE ID_temporada = ?');
    $query->execute([$ID_temporada]);
    return $query->fetch(PDO::FETCH_OBJ);
}

    // Insertar nueva temporada
        public function insertSeason($Nombre, $Fecha_estreno, $Productora, $Imagen) {
    $query = $this->db->prepare("INSERT INTO temporadas ( Nombre, Fecha_estreno, Productora, Imagen) VALUES (?, ?, ?, ?)");
    $query->execute([$Nombre, $Fecha_estreno, $Productora, $Imagen]);
}
    // Actualizar temporada existente
    public function updateSeason($ID_temporada, $Nombre, $Fecha_estreno, $Productora, $Imagen) {
        $query = $this->db->prepare('UPDATE temporadas SET Nombre = ?, Fecha_estreno = ?, Productora = ?, Imagen = ? WHERE ID_temporada = ?');
        $query->execute([$Nombre, $Fecha_estreno, $Productora, $Imagen, $ID_temporada]);
    }

    // Eliminar temporada
    public function removeSeason($ID_temporada) {
    $query = $this->db->prepare('DELETE FROM temporadas WHERE ID_temporada = ?');
    $query->execute([$ID_temporada]);
}
}