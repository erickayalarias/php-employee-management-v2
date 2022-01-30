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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JS -->
    <script src="<?php echo constant("URL");?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo constant("URL");?>public/assets/js/main.js" defer></script>
</head>
<body>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo constant("URL");?>dashboard"> <b>PHP - Employee - Management</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a id='nav-dashboard' class="nav-link" href="<?php echo constant("URL");?>dashboard" aria-current="page">Dashboard</a>
          </li>
          <li class="nav-item">
            <a id='nav-employee' class="nav-link" href="<?php echo constant("URL");?>form">Employee</a>
          </li>
        </ul>
        <form class="d-flex">
        <a href='<?php
 $urlhead= constant("URL")."login/Logout";
 echo $urlhead;
  ?> ' class="btn btn-outline-success">Logout</a>
        </form>
      </div>
    </div>
  </nav>
</header>
</body>
</html>