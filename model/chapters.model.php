<?php

class ChaptersModel{
    private $db;

    function __construct(){
    // abro coneccion a la DB
    $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', '');  
    }

     public function chaptersBySeason($id_serie) {
        $query = $this->db->prepare('SELECT * FROM capitulos WHERE ID_temporada_fk = ?');
        $query->execute([$id_serie]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllchapters(){
        //ejecuto la consulta sql
        $query = $this->db->prepare('SELECT * FROM `capitulos` JOIN temporadas ON capitulos.ID_temporada_fk = temporadas.ID_temporada');
        $query -> execute();

        //obtengo los resultados de la consulta

        $chapters = $query->fetchAll(PDO::FETCH_OBJ);
        return $chapters;
    }

    public function getChapter($id) {
        $query = $this->db->prepare('SELECT * FROM capitulos WHERE ID_capitulos = ?');
        $query->execute([$id]);
        $chapter = $query->fetch(PDO::FETCH_OBJ);
        return $chapter;
    }

    function insertChapter($Titulo, $Descripcion,$ID_serie_fk) {
        $query = $this->db->prepare ("INSERT INTO capitulos(Titulo, Descripcion,ID_temporada_fk) VALUES(?,?,?)");
        $query->execute([$Titulo, $Descripcion,$ID_serie_fk]);
    }

    public function updateChapter($ID_capitulos, $Titulo, $Descripcion,$ID_serie_fk) {
        $query = $this->db->prepare('UPDATE capitulos SET Titulo = ?, Descripcion = ?, ID_temporada_fk = ? WHERE ID_capitulos = ?');
        $query->execute([$Titulo, $Descripcion,$ID_serie_fk,$ID_capitulos]);
    }

    function removeChapter($ID_capitulos) {
        $query = $this->db->prepare('DELETE from capitulos where ID_capitulos = ?');
        $query->execute([$ID_capitulos]);
    }
 }
?>