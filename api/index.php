<?php
    ini_set("memory_limit","120M");
    include 'vendor/autoload.php';
    //setup API
    $app = new \Slim\App;

    //routes
    include 'routes/user.php';

    //run API
    $app->run();
?>