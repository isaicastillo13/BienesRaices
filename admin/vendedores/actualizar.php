<?php
require '../../include/app.php';

use App\Vendedor;
estaAutenticado();

$vendedor = new Vendedor;
$errores = Vendedor::getErrores();

//validar que sea un id valido
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}

$vendedor = Vendedor::find($id);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $arg = $_POST['vendedor']; 
    $vendedor -> sincronizar($arg);
    $errores = $vendedor->validar();
     
    if(empty($errores)){
        $vendedor -> guardar();
    } 

    // Validando que se haya ejecutado el query de la manera correcta.
    header('Location: /admin?resultado=2'); 
}

incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php
    foreach ($errores as $error) :
    ?>

        <div class="alerta error">
            <?php
            echo $error;
            ?>
        </div>

    <?php
    endforeach;
    ?>



    <form class="formulario" method="POST" enctype="multipart/form-data">
        
        <?php include '../../include/templates/formulario_vendedores.php';?>

        <input type="submit" value="Guardar" class="boton boton-verde">
    </form>
</main>