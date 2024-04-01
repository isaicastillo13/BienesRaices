<?php

require 'include/app.php';
use App\Propiedades;

//Validar id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);



$propiedad = Propiedades::find($id);

if(!$id){
    header('Location: /');
}

incluirTemplates('header');


?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo?></h1>

        
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen?>" alt="imagen de la propiedad">
       

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->banios?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>

                <p><?php echo $propiedad->descripcion?></p>
        </div>
    </main>

<?php
    incluirTemplates('footer');
?>