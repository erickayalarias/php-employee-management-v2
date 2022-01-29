<?php 


class Main extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("main/index");
    }
    public function  getdb(){
        $db= $this->model->RetDb();
        echo json_encode($db);
    }
    public function Delete(){
        if(isset(urlPath[2])){
            $idDelete=urlPath[2];
            $this->model->DeletEmployee($idDelete);
        }
    }
}

?> 