<?php 


class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("nuevo/index");
    }
    public function add(){
    //    echo "alumno creado";
    // echo urlPath[2];
    if(!isset(urlPath[2])){
        echo "pepe";
    }
    //   if($this->model->insert($_POST)){
    //      $mensaje="nuevo Alumno creado";
    //      echo "entro aqui";
    //   }else{
    //       $mensaje="Estos datos ya estan repetidos";
    //       echo "entro en el else";
    //   };
    }

    public function checked(){
        //  echo $_POST["email"];
         if(isset(urlPath[2])){
             $id= urlPath[2];
             $dbId= $this->model->dbCheck($id);
             // print_r($dbId);
             $this -> view -> mensaje =$dbId[0];
             $this -> render();
        }
    }
    public function updated(){
        echo "pepe";
        echo $_POST;
    }
    public function data(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "pepe";
        }
        // print_r($_POST);
        // print_r($_REQUEST);
        // var_dump($_REQUEST);
        // $_SERVER;
        // print_r($_SERVER);
    }
}


?> 