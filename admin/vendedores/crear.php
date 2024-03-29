<?php
require '../../include/app.php';

use App\Vendedor;
estaAutenticado();

$vendedor = new Vendedor;
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     // Valida si no hay ningun error y permite guardar
     $vendedor = new Vendedor($_POST['vendedor']);
     $errores = $vendedor->validar();

     if (empty($errores)) {
        
        // Guardar en la base de datos
        $resultado =  $vendedor -> guardar();    

        // Validando que se haya ejecutado el query de la manera correcta.
        header('Location: /admin?resultado=1');

    }
}

incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>
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



    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">
        
        <?php include '../../include/templates/formulario_vendedores.php';?>

        <input type="submit" value="Registrar" class="boton boton-verde">
    </form>
</main>