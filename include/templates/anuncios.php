<?php
    //Importar la conexion a la base de datos

    $db = conectarBD();
    
    //Consultar en la base de datos
    $query = "SELECT * FROM propiedades LIMIT {$limite}";

    //Obterner el resultado
    $resultado = mysqli_query($db, $query);
   
?>

<div class="contenedor-anuncios">
    <?php
     while($propiedades = mysqli_fetch_assoc($resultado)):
    ?>
        <div class="anuncio">
                <img loading="lazy" src="/imagenes/<?php echo $propiedades['imagen']; ?>" alt="anuncio1">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedades['titulo']; ?></h3>
                <p><?php echo $propiedades['descripcion']; ?></p>
                <p class="precio"><?php echo $propiedades['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedades['banios']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedades['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedades['habitaciones']; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedades['id']; ?>" class="boton boton-amarillo">
                    Ver Propiedad
                </a>
            </div> <!--contenido-anuncio-->
        </div> <!--anuncio-->
        <?php
                endwhile;
            ?>
       
    </div>


    <?php
        //Cerrar la conexion
        mysqli_close($db);
    ?>