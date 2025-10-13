<?php

class ChaptersModel{

    private $db;

    function __construct(){

    // abro coneccion a la DB

    $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', '');
        
    }

    function getAllchapters(){
        //ejecuto la consulta sql
        $query = $this->db->prepare('SELECT * FROM capitulos');
        $query -> execute();

        //obtengo los resultados de la consulta

        $chapters = $query->fetchAll(PDO::FETCH_OBJ);
        return $chapters;
    }

    public function getChapter($id) {
        $query = $this->db->prepare('SELECT * FROM capitulos WHERE id = ?');
        $query->execute([$id]);
        $chapter = $query->fetch(PDO::FETCH_OBJ);

        return $chapter;
    }

    function insert($title, $description) {
        $query = $this->db->prepare("INSERT INTO capitulos(titulo, descripcion) VALUES(?,?,)");
        $query->execute([$title, $description]);


        return $this->db->lastInsertId();
    }
    function removeChapter($id) {
        $query = $this->db->prepare('DELETE from capitulos where id = ?');
        $query->execute([$id]);

        
    }
    function finalizeChapter($id, $title,$description,$serie) {
        $query = $this->db->prepare('UPDATE capitulos SET Titulo = ?, Descripcion = ?, ID_serie = ? WHERE ID_serie = ?');
        $query->execute([$title, $description, $serie, $id]);
    }

 }
?>