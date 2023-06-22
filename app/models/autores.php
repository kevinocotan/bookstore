<?php
include_once "app/models/db.class.php";
class Autores extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

    public function getAll() {
        return $this->executeQuery("Select id_autor, autor from autores order by autor");
    }

    public function getAllOrderByName(){
        return $this->executeQuery("Select id_autor, autor from autores order by autor");
    }

    public function save($data){
        return $this->executeInsert("Insert into autores set autor='{$data["autor"]}'");
    }

    public function getAutorByName($autor){
        return $this->executeQuery("Select id_autor, autor from autores where autor='{$autor}'");
    }

    public function getOneAutor($id) {
        return $this->executeQuery("Select id_autor, autor from autores where id_autor='{$id}'");
    }

    public function update($data) {
        return $this->executeInsert("update autores set autor='{$data["autor"]}' where id_autor='{$data["id_autor"]}'");
    }

    public function deleteAutor ($id) {
        return $this->executeInsert("delete from autores where id_autor='$id'");
        
    }
} 

