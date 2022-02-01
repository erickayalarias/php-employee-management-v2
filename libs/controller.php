<?php
// echo "pepe";

class Controller{

    public function __construct(){
        $this -> view = new View();
    }
    function loadModel($model){
        $url= "models/".$model."model.php";
        if(file_exists($url)){
            require $url;
            $modelName=$model."Model";
            $this->model = new $modelName();
        }
    }
}

?>