<?php

    require 'funciones.php';
    require 'config/databases.php';
    require __DIR__ . '/../vendor/autoload.php';

    $db=conectarBD();

    use App\Propiedades;

    $propiedades = new Propiedades;
    
    Propiedades::setDB($db);
?>