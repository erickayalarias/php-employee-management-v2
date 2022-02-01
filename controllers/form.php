<?php 


class Form extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("Form/index");
    }
    public function add(){
    if($_SERVER["REQUEST_METHOD"] == "POST" && !isset(urlPath[2])){
        $infoEmail= $this -> model -> checkEmail($_POST);
        if(isset($infoEmail)){
           echo $infoEmail["id"];
        }else{
            $this->model->insert($_POST);
            echo 100000;
        }
    }
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
        // echo "pepe";
        echo $_POST;
    }
    public function data(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $this ->model -> updateEmployee($_POST, urlPath[2] );
        }
    }
}


?> 