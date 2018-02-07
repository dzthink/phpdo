<?php
require_once "../vendor/autoload.php";
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__DIR__). DIRECTORY_SEPARATOR . "src");
spl_autoload_register(function($class){

    if(strpos($class, 'phpdo\\') === 0) {
        $path = str_replace("phpdo", "", $class);
        $path = str_replace("\\", "/", $path);
        echo dirname(__DIR__) . DIRECTORY_SEPARATOR ."src" .  $path . ".php";
        require dirname(__DIR__) . DIRECTORY_SEPARATOR ."src" .  $path . ".php";
    }
});