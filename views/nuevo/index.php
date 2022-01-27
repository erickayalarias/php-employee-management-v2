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
    ?>

<div id="main">
    <h1 class="center">Seccion de Nuevo</h1>
    <div class="center"><?php if(isset($this ->mensaje)){
        echo $this -> mensaje;
    }
        ?></div>
    <form action="<?php echo constant("URL");?>/nuevo/registrarAlumno" method="post">
    <p>
        <label for="matricula">Matricula</label><br>
        <input type="text" name="matricula" id="" required>
    </p>
    <p>
        <label for="nombre">nombre</label><br>
        <input type="text" name="nombre" id="" required>
    </p>
    <p>
        <label for="apellido">apellido</label><br>
        <input type="text" name="apellido" id="" required>
    </p>

    <p>
        <input type="submit" value="Registrar nuevo alumno">
    </p>

    </form>
</div>
    <?php 
    require "views/footer.php";
    ?>
</body>
</html>