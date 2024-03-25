<?php

require '../../include/app.php';

estaAutenticado();

use App\Propiedades;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


//validar que sea un id valido
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}
$propiedades = Propiedades::find($id);

//  Consultar todos los vendedores
$vendedores = Vendedor::all();

// Arreglo para el manejo de errores
    $errores = Propiedades::getErrores();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $arg = $_POST['propiedades']; 

        $propiedades -> sincronizar($arg);

        $errores = $propiedades->validar();


        
        $nombreImagenes = md5(uniqid(rand(), true)) . ".jpg";
        
        //Realizar un rize con Intervation
        if($_FILES['propiedades']['tmp_name']['imagen']){      
            $image = Image::make($_FILES['propiedades']['tmp_name']['imagen'])->fit(800, 600);
            $propiedades->setImagen($nombreImagenes);
        }

        if (empty($errores)) {
            if($_FILES['propiedades']['tmp_name']['imagen']){      
                $image = Image::make($_FILES['propiedades']['tmp_name']['imagen'])->fit(800, 600);
                $image->save(CARPETA_IMAGENES . $nombreImagenes);
            }

            $propiedades->guardar();   
    }
}


incluirTemplates('header');


?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php
    foreach ($errores as $error):
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
        <?php include '../../include/templates/formulario_propiedades.php';?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

    </form>
</main>


<?php
incluirTemplates('footer');
?>