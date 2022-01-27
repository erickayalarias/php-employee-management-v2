<?php
require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";



require_once "config/config.php";
// require_once("libs/Database.php");
// require_once("config/executionFlow.php");
// require_once("config/baseConstants.php");
// require_once("config/constants.php");
// require_once(LIBS . "/Controller.php");
// require_once(LIBS . "/View.php");
// require_once(LIBS . "/Model.php");
// require_once(LIBS . "/Router.php");

// require_once('config/db.php');

// $router = new Router();

$app= new App();

// # This will allow to make requests to files that aren't .php
// # -----------------------------------------------------------
// # Not a directory
// RewriteCond %{REQUEST_FILENAME} !-d
// # Not a file
// RewriteCond %{REQUEST_FILENAME} !-f
// # Not a another thing
// RewriteCond %{REQUEST_FILENAME} !-l
// # -----------------------------------------------------------?
