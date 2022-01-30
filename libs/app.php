<?php
require_once "controllers/errores.php";
class App{
    function __construct()
    {
        $url= isset($_GET["url"]) ? $_GET["url"] : NULL;
        $url = rtrim($url, "/");
        $url= explode("/", $url);
        define("urlPath", $url);
        //cuando se ingresa sin definir controlador
        if(empty($url[0])){
            // Hacer un if si ha iniciado sesion tambien
            $archivoController ="controllers/dashboard.php";
            require_once $archivoController;
            $controller = new dashboard();
            $controller -> loadModel("dashboard");
            $controller ->render();
            return false;
        }
        $archivoController ="controllers/".$url[0].".php";

        
       if(file_exists($archivoController)){
           require_once $archivoController;
           $controller = new $url[0];
           $controller -> loadModel($url[0]);
           if(isset($url[1])){
               $controller->{$url[1]}();
           }else{
               $controller ->render();
           }
       }else{
        $controller= new Errores();
       }
    }
}

?>