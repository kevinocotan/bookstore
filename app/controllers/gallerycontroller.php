<?php
include_once "app/models/libros.php";

class GalleryController extends Controller {
    private $libro;
    public function __construct($parametro) {
        $this->libro=new Libros();
        parent::__construct("gallery",$parametro);
    }

    function getLibros(){
        $records=$this->libro->getLibroByCategoria($_GET["id"]);
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

}