<?php

require 'include/app.php';
incluirTemplates('header');

//Conexion a la BD

$db = conectarBD();

//Validar id
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);


//Consultar a la BD

$query = "SELECT * FROM propiedades WHERE id = {$id}";

//Obetener el resultado

$resultado = mysqli_query($db, $query);

if(!$resultado ->num_rows){
    header('Location: /');
}


?>

    <main class="contenedor seccion contenido-centrado">
        <?php 
            $propiedades = mysqli_fetch_assoc($resultado);
        ?>
        <h1><?php echo $propiedades['titulo']?></h1>

        
            <img loading="lazy" src="/imagenes/<?php echo $propiedades['imagen']?>" alt="imagen de la propiedad">
       

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedades['precio']?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedades['banios']?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedades['estacionamiento']?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedades['habitaciones']?></p>
                </li>
            </ul>

                <p><?php echo $propiedades['descripcion']?></p>
        </div>
    </main>

<?php
    incluirTemplates('footer');

    //Cerrar BD
    mysqli_close($db);
?>