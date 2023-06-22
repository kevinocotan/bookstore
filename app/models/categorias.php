<?php
include_once "app/models/db.class.php";
class Categorias extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

    public function getAll(){
        return $this->executeQuery("Select id_cate, categoria from categorias order by id_cate");
    }

    public function getAllOrderByName(){
        return $this->executeQuery("Select id_cate, categoria from categorias order by categoria");
    }

    public function save($data){
        return $this->executeInsert("Insert into categorias set categoria='{$data["categoria"]}'");
    }

    public function getCategoriaByName($categoria){
        return $this->executeQuery("Select id_cate, categoria from categorias where categoria='{$categoria}'");
    }

    public function getOneCategoria($id) {
        return $this->executeQuery("Select id_cate, categoria from categorias where id_cate='{$id}'");
    }

    public function update($data) {
        return $this->executeInsert("update categorias set categoria='{$data["categoria"]}' where id_cate='{$data["id_cate"]}'");
    }

    public function deleteCategoria ($id) {
        return $this->executeInsert("delete from categorias where id_cate='$id'");
        
    }
} 