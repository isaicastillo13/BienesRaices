<?php

// Importar la conexion
require 'include/app.php';
$db = conectarBD();

//Crear un email y password
$email = "correo@correo";
$password = "123456";

// Hashear el password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// crear el usuario
$query = "INSERT INTO usuarios (email,password) VALUE ('{$email}', '{$passwordHash}');";
// var_dump($passwordHash);

// exit;

mysqli_query($db,$query);
// agregar a la base de datos