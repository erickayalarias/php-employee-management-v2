<?php 


class Main extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("main/index");
    }
    public function  getdb(){
        echo "pepe";
        $db= $this->model->RetDb();
        echo json_encode($db);
        // echo $db;
    }

}

?> 