<?php

class SerieModel{
    private $db;

    function __construct(){
    // abro coneccion a la DB
    $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', '');
    }

    function getAllseasons(){
        //ejecuto la consulta sql
        $query = $this->db->prepare('SELECT * FROM temporada');
        $query -> execute();

        //obtengo los resultados de la consulta

        $seasons = $query->fetchAll(PDO::FETCH_OBJ);
        return $seasons;
    }
    public function getSeason($id) {
        $query = $this->db->prepare('SELECT * FROM temporada WHERE id = ?');
        $query->execute([$id]);
        $season = $query->fetch(PDO::FETCH_OBJ);

        return $season;
    }
    function insertSeason($Name, $premiere_date, $Producer, $image) {
        $query = $this->db->prepare("INSERT INTO temporada(Nombre, Fecha_estreno, Productora, imagen) VALUES(?,?,?,?)");
        $query->execute([$Name, $premiere_date, $Producer, $image]);
        return $this->db->lastInsertId();
    }
    function updateSeason($id, $Name, $premiere_date, $Producer, $image) {
        $query = $this->db->prepare('UPDATE temporada SET Nombre = ?, Fecha_estreno = ?, Productora = ?, imagen = ? WHERE ID_serie = ?');
        $query->execute([$id, $Name, $premiere_date, $Producer, $image]);
    }
    function removeSeason($id) {
        $query = $this->db->prepare('DELETE from temporada where id = ?');
        $query->execute([$id]);
    }
}