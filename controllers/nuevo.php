<?php 


class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("nuevo/index");
    }
    public function registrarAlumno(){
    //    echo "alumno creado";
    
       $matricula= $_POST["matricula"];
       $nombre= $_POST["nombre"];
       $apellido= $_POST["apellido"];
      if($this->model->insert(["matricula"=>$matricula, "nombre"=>$nombre, "apellido"=> $apellido])){
         $mensaje="nuevo Alumno creado";
      }else{
          $mensaje="Estos datos ya estan repetidos";
      };
      $this -> view -> mensaje =$mensaje;
      $this -> render();
    }
}


?> 