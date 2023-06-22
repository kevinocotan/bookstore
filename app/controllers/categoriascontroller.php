<?php
include_once "app/models/categorias.php";

class CategoriasController extends Controller {
    private $categoria;
    public function __construct($parametro) {
        $this->categoria=new Categorias();
        parent::__construct("categorias",$parametro,true);
    }

    public function getAll() {
        $records=$this->categoria->getAll();
        $info=array('success'=>true, 'records'=>$records);
        echo json_encode($info);
    }
    public function save() {
        if ($_POST["id_cate"]==0) {
            $datosCategoria=$this->categoria->getCategoriaByName($_POST["categoria"]);
            if (count($datosCategoria)>0){
                $info=array('success'=>false, 'msg'=>"La categoria ya existe.");
            } else {
                $records=$this->categoria->save($_POST);
                $info=array('success'=>true, 'msg'=>"Registro guardado con exito.");
            }
        } else {
            $records=$this->categoria->update($_POST);
            $info=array('success'=>true, 'msg'=>"Registro guardado con exito.");
        }
        echo json_encode($info);
    }

    public function getOneCategoria() {
        $records=$this->categoria->getOneCategoria($_GET["id"]);
        if (count ($records) > 0 ){
            $info=array('success'=>true, 'records'=>$records);
        } else {
            $info=array('success'=>false, 'msg'=>'La Categoria no existe');
        }
        echo json_encode($info);
    }

    public function deleteCategoria(){
        $records=$this->categoria->deleteCategoria($_GET["id"]);
        $info=array('success'=>true, 'msg'=>"Categoria eliminada con exito");
        echo json_encode($info);
    }
}