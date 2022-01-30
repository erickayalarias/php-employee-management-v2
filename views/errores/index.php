<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant("URL");?>public/assets/css/error.css">
    <title>Document</title>
</head>
<body>
<?php 
    require "views/header.php";
    ?>
    <p>HTTP: <span>404</span></p>
    <code><span>this_page</span>.<em>not_found</em> = true; </em></code>
    <code><span>if</span> (<b>you_spelt_it_wrong</b>) {<span>try_again()</span>;}</code>
<code><span>else if (<b>we_screwed_up</b>)</span> {<em>alert</em>(<i>"We're really sorry about that."</i>); <span>window</span>.<em>location</em> <em>= true; } </em></code>
<!-- <center><a>HOME</a></center> -->
<?php 
    require "views/footer.php";
    ?>
</body>
</html>
