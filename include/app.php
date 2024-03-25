<?php

    require 'funciones.php';
    require 'config/databases.php';
    require __DIR__ . '/../vendor/autoload.php';

    $db=conectarBD();

    use App\ActiveRecord;
    
    ActiveRecord::setDB($db);
?>