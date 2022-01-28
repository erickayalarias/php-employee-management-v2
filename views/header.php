<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Aqui estaran los modules y el js -->

    <script src="<?php echo constant("URL");?>node_modules/jquery/dist/jquery.js"></script>

    <script src="<?php echo constant("URL");?>node_modules/jsgrid/dist/jsgrid.min.js"></script>

    <link rel="stylesheet" href="<?php echo constant("URL");?>node_modules/jsgrid/dist/jsgrid.min.css">

    <link rel="stylesheet" href="<?php echo constant("URL");?>node_modules/jsgrid/dist/jsgrid-theme.min.css">

    <link rel="stylesheet" href="<?php echo constant("URL");?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant("URL");?>public/assets/css/default.css">
    
    <!-- JS -->
    <script src="<?php echo constant("URL");?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo constant("URL");?>public/assets/js/main.js" defer></script>
</head>
<body>
    <div id="header">
    <ul>
        <li><a href=" <?php echo constant("URL");?>main">Inicio</a></li>
        <li><a href="<?php echo constant("URL");?>nuevo">Nuevo</a></li>
        <li><a href=" <?php echo constant("URL");?>consulta">Consulta</a></li>
        <li><a href="<?php echo constant("URL");?>ayuda">Ayuda</a></li>
    </ul>
    </div>
</body>
</html>