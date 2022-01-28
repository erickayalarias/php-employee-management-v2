<?php
//  Aqui entro a la base de datos y una vez que entro compruebo si las contraseñas son correctas si lo son lo envio directamente al main donde se comprobare que la sesion este iniciada

class Login extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this ->view->render("login/index");
    }
    public function checkLogin(){
        $data= $this->model->check();

        if(isset($_POST["email"]) & isset($data)){
            $postEmail= $_POST["email"];
            $postPassword= $_POST["password"];

            foreach ($data as $db) {
                echo $db["email"];
                if($db["email"]= $_POST["email"]){
                    if(password_verify($_POST["password"],$db["password"] )){
                        //! Entra aqui
                        session_start();
                        $_SESSION["email"] = $postEmail;
                        $_SESSION["password"] = $postPassword;
                        // $this -> view -> render("main/index");
                        $urlhead= constant("URL")."main";
                        header("Location: $urlhead");
                    }
                }
            }
        }
    }

    public function Logout(){
        session_start();
        unset($_SESSION);
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
        session_destroy();
        $urlhead= constant("URL")."login";
        header("Location: $urlhead");
    }

}
?> 
