<?php

// Conexion a la BD
require 'include/app.php';

$db = conectarBD();



// Autenticar el usuario

 $errores = [];
if($_SERVER ['REQUEST_METHOD'] === 'POST'){
 
    $email = mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db,$_POST['password']);
    
    if(!$email){
        $errores[]="El campo Email esta vacio o no es valido";
    }

    if(!$password){
        $errores[]="El Password es Obligatorio";
    }

    if(empty($errores)){
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db, $query);

        if( $resultado -> num_rows){

            $usuario = mysqli_fetch_assoc($resultado); 

            // Verificar si el password es correcto o no y devuleve booleano
            $auth = password_verify($password, $usuario['password'] );
            if($auth){
                // El usuario esta Autentificado
                session_start();

                $_SESSION['usuario'] = $usuario ['email'];
                $_SESSION['login'] = true;
                header('Location: admin/index.php');

            }else{
                $errores [] = "El Password es incorrecto";
            }
        }else{
            $errores[] = "El Usarios No existe";
        }

    }


   
}

incluirTemplates('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo "$error"?>
        </div>
    <?php endforeach; ?>


    <form class="formulario" method="POST" action="">

    <fieldset>
            <legend>E-mail y Password</legend>

            <label for="email">E-mail</label>
            <input type="text" placeholder="email@email.com" id="email" name="email" >

            <label for="password">Password</label>
            <input type="password" placeholder="Tu contraseña" id="password" name="password" >
        </fieldset>
        <input class="boton-verde" type="submit" value="Inciar Sesión">
    </form>
</main>


<?php
incluirTemplates('footer');
?>