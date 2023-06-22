<?php
include_once "app/models/categorias.php";

class MainController extends Controller {
    private $cate;
    public function __construct($parametro) {
        $this->cate=new Categorias();
        parent::__construct("main",$parametro);
    }

    public function getAcercade() {
        $this->view->render("acercade");
    }

    public function getAllCategorias(){
        $records=$this->cate->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}