<?php

class UserModel {
    private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=db_peaky_blinders;charset=utf8', 'root', '');
    }

    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM Usuarios WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE Usuario = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    
    public function getAll() {
        
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();

        
        $users = $query->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    function insert($name, $password) {
        $query = $this->db->prepare("INSERT INTO usuarios(Usuario, contraseña) VALUES(?,?)");
        $query->execute([$name, $password]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }
}
