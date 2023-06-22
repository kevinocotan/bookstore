<?php
include_once "app/models/db.class.php";
class Libros extends BaseDeDatos {

    public function __construct() {
        $this->conectar();
    }

    public function getAll() {
        return $this->executeQuery("Select id_libro, titulo, descripcion, categoria, autor, 
        date_format(fecha_publicacion,'%d-%m-%Y') as fecha_publicacion 
        from categorias inner join (autores inner join libros using(id_autor)) 
        using(id_cate) order by titulo");
    }

    public function getLibroByTitulo($titulo) {
        return $this->executeQuery("Select id_libro, titulo from libros where titulo='{$titulo}'");
    }

    public function save($data, $imgp, $imgm, $imgg) {
        return $this->executeInsert("insert into libros set titulo='{$data["titulo"]}', descripcion='{$data["descripcion"]}', id_autor='{$data["id_autor"]}', id_cate='{$data["id_cate"]}', fecha_publicacion='{$data["fecha_publicacion"]}', fotop='{$imgp}', fotom='{$imgm}', fotog='{$imgg}'");
    }

    public function getOneBook($id) {
        return $this->executeQuery("Select id_libro, titulo, descripcion, id_autor, id_cate, fecha_publicacion, fotop, fotom, fotog from libros where id_libro='{$id}'");
    }

    public function update($data, $imgp, $imgm, $imgg) {
        return $this->executeInsert("update libros set titulo='{$data["titulo"]}', descripcion='{$data["descripcion"]}', id_autor='{$data["id_autor"]}', id_cate='{$data["id_cate"]}', fecha_publicacion='{$data["fecha_publicacion"]}', 
        fotop=if('{$imgp}'='',fotop,'{$imgp}'), 
        fotom=if('{$imgm}'='',fotom,'{$imgm}'),
        fotog=if('{$imgg}'='',fotog,'{$imgg}')
        where id_libro='{$data["id_libro"]}'");
    }

    public function deleteBook($id) {
        return $this->executeInsert("delete from libros where id_libro='$id'");
    }

    public function getLibrosReporte($data){
        $condicion="";
        if ($data["idautor"]!="0") {
            $condicion.="and c.id_autor='{$data["idautor"]}'";
        }
        if ($data["idcate"]!="0") {
            $condicion.="and b.id_cate='{$data["idcate"]}'";
        }
        return $this->executeQuery("Select a.*, b.categoria, c.autor, date_format(a.fecha_publicacion, '%d-%M-%Y') as fecha_pub from autores c 
        inner join (categorias b inner join libros a using(id_cate)) using (id_autor)
        where 1=1 $condicion");
    }

    function getLibroByCategoria($id){
        return $this->executeQuery("Select id_libro, titulo,descripcion,categoria,autor,
        fotop, fotom, fotog from categorias inner join (autores inner join libros using
        (id_autor)) using(id_cate) where categorias.id_cate='$id' order by titulo"); 
    }
}
