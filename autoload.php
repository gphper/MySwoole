<?php
define("DIR",dirname(__FILE__));

function load($className){
    $file_path = str_replace('\\', DIRECTORY_SEPARATOR, DIR .'\\'. $className).'.php';
    require $file_path;
}

spl_autoload_register("load");

require_once "router.php";
require_once "app/Libraries/helper.php";