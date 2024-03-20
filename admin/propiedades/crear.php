<?php
require '../../include/app.php';

use App\Propiedades;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

// Base de Datos

$db = conectarBD();

$propiedades = new Propiedades();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo para el manejo de errores
$errores = Propiedades::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$banios = '';
$estacionamiento = '';
$vendedores_id = '';


// Ejecutar el codigo despues de enviar el formulario al base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Crea una nueva instancia
    $propiedades = new Propiedades($_POST['propiedades']);
    

    // Crear carpeta para la imagenes
    $carpetaImagenes = '../../imagenes/';
    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);    
    }

    //Generar un nombre unico para cada imagen
    $nombreImagenes = md5(uniqid(rand(), true)) . ".jpg";

    //Realizar un rize con Intervation
    if($_FILES['propiedades']['tmp_name']['imagen']){      
        $image = Image::make($_FILES['propiedades']['tmp_name']['imagen'])->fit(800, 600);
        $propiedades->setImagen($nombreImagenes);
    }


    // Valida si no hay ningun error y permite guardar
    $errores = $propiedades->validar();

    
    // print
    if (empty($errores)) {
        
       
        if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }

        // Guardar las imagenes en el servidor
        $image->save(CARPETA_IMAGENES.$nombreImagenes);

        // Guardar en la base de datos
        
        $resultado =  $propiedades -> guardar();    
        // Validando que se haya ejecutado el query de la manera correcta.
        header('Location: /admin?resultado=1');

    }
   
}
incluirTemplates('header');


?>

<main class="contenedor seccion">
    <h1>Crear</h1>
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



    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        
        <?php include '../../include/templates/formulario_propiedades.php';?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>


<?php
incluirTemplates('footer');
?>