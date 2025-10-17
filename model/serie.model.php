<?php

class SerieModel{

    private $db;

    function __construct(){

    // abro coneccion a la DB

    $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', '');
        
    }

    function getAllseasons(){
        //ejecuto la consulta sql
        $query = $this->db->prepare('SELECT * FROM serie');
        $query -> execute();

        //obtengo los resultados de la consulta

        $seasons = $query->fetchAll(PDO::FETCH_OBJ);
        return $seasons;
    }
    
}