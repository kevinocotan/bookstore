<?php
include_once "app/models/autores.php";

class AutoresController extends Controller {
    private $autor;
    public function __construct($parametro) {
        $this->autor=new Autores();
        parent::__construct("autores",$parametro,true);
    }

    public function getAll() {
        $records=$this->autor->getAll();
        $info=array('success'=>true, 'records'=>$records);
        echo json_encode($info);
    }
    public function save() {
        if ($_POST["id_autor"]==0) {
            $datosAutor=$this->autor->getAutorByName($_POST["autor"]);
            if (count($datosAutor)>0){
                $info=array('success'=>false, 'msg'=>"El autor ya existe.");
            } else {
                $records=$this->autor->save($_POST);
                $info=array('success'=>true, 'msg'=>"Registro guardado con exito.");
            }
        } else {
            $records=$this->autor->update($_POST);
            $info=array('success'=>true, 'msg'=>"Registro guardado con exito.");
        }
        echo json_encode($info);
    }

    public function getOneAutor() {
        $records=$this->autor->getOneAutor($_GET["id"]);
        if (count ($records) > 0 ){
            $info=array('success'=>true, 'records'=>$records);
        } else {
            $info=array('success'=>false, 'msg'=>'El autor no existe');
        }
        echo json_encode($info);
    }

    public function deleteAutor(){
        $records=$this->autor->deleteAutor($_GET["id"]);
        $info=array('success'=>true, 'msg'=>"Autor eliminado con exito");
        echo json_encode($info);
    }
}