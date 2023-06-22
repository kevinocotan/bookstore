<?php
include_once "app/models/libros.php";
class LibrosController extends Controller {
    private $libro;
    public function __construct($parametro) {
        $this->libro=new Libros();
        parent::__construct("libros",$parametro,true);
    }

    public function getAll() {
        $records=$this->libro->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function save() {
        $imgp="";
        $imgm="";
        $imgg="";
        //Proceso para guardar el archivo
        if (isset($_FILES)) {
            // Imagen pequeña
            if (is_uploaded_file($_FILES["fotop"]["tmp_name"])) {
                if (($_FILES["fotop"]["type"]=="image/png") ||
                    ($_FILES["fotop"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotop"]["tmp_name"],
                        __DIR__."/../../public_html/fotos/".$_FILES["fotop"]["name"])
                        or die("No se pudo copiar el archivo");
                        $imgp=URL."public_html/fotos/".$_FILES["fotop"]["name"];
                    }
            }
            // Imagen mediana
            if (is_uploaded_file($_FILES["fotom"]["tmp_name"])) {
                if (($_FILES["fotom"]["type"]=="image/png") ||
                    ($_FILES["fotom"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotom"]["tmp_name"],
                        __DIR__."/../../public_html/fotos/".$_FILES["fotom"]["name"])
                        or die("No se pudo copiar el archivo");
                        $imgm=URL."public_html/fotos/".$_FILES["fotom"]["name"];
                    }
            }
            // Imagen Grande
            if (is_uploaded_file($_FILES["fotog"]["tmp_name"])) {
                if (($_FILES["fotog"]["type"]=="image/png") ||
                    ($_FILES["fotog"]["type"]=="image/jpeg")) {
                        copy($_FILES["fotog"]["tmp_name"],
                        __DIR__."/../../public_html/fotos/".$_FILES["fotog"]["name"])
                        or die("No se pudo copiar el archivo");
                        $imgg=URL."public_html/fotos/".$_FILES["fotog"]["name"];
                    }
            }
        }
        if ($_POST["id_libro"]=="0") {
            $datosLibro=$this->libro->getLibroByTitulo($_POST["titulo"]);
            if (count($datosLibro)>0) {
                $info=array('success'=>false,'msg'=>"El libro ya existe");
            } else {
                $records=$this->libro->save($_POST,$imgp,$imgm,$imgg);
                $info=array('success'=>true,'msg'=>"Registro guardado con exito");
            }
        } else {
            $records=$this->libro->update($_POST,$imgp,$imgm,$imgg);
            $info=array('success'=>true,'msg'=>"Registro guardado con exito");
        }
        echo json_encode($info);
    }

    public function getOneBook() {
        $records=$this->libro->getOneBook($_GET["id"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El libro no existe');
        }
        echo json_encode($info);
    }

    public function deleteBook() {
        $records=$this->libro->deleteBook($_GET["id"]);
        $info=array('success'=>true,'msg'=>"Libro eliminado con exito");
        echo json_encode($info);
    }
}