<?php 

function conectarBD() : mysqli{
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');

    if(!$db){
        echo 'No se pudo conectar a la base de datos';
        exit;
    }

    return $db;

}