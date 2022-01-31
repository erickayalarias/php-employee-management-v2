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
    public function nep(){
        $this -> model -> addEmployee($_POST);
   
    }
    public function checkTime(){
        session_start();
        if(isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 600){
            $urlheada= constant("URL")."login/Logout";
            echo $urlheada;
        }
    }
}

?> 