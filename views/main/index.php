<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require "views/header.php";
    // Podria poner esto en todos los sitios para poder
    // decir que si eso no existe no podria hacer nada
    // Como de momento todo esta conectado se deja
    session_start();
    if(!isset($_SESSION["email"])){
        $urlhead= constant("URL")."login";
        header("Location: $urlhead");
    }
    ?>

<div id="main">
    <h1 class="center">Bienvenido al sitio</h1>
</div>
<a href='<?php
 $urlhead= constant("URL")."login/Logout";
 echo $urlhead;
  ?> ' class="btn btn-outline-success">Logout</a>
    <?php 
    require "views/footer.php";
    ?>
</body>
</html>