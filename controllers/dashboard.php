<?php 


class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("dashboard/index");
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
    public function pepe(){
        if(isset(urlPath[2])){
            $id=urlPath[2];
            echo $id;
            // $this->model->DeletEmployee($idDelete);
        }
    }
}

?> 