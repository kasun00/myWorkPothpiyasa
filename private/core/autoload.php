<?php

require("config.php");
require("helpers.php");
require("database.php");
require("controller.php");
require("model.php");
require("app.php");

//Every time a class is not found this function invoke
spl_autoload_register(function($class_name){

    require("../private/models/".ucfirst($class_name).".php");
});


