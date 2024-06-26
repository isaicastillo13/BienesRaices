<?php
  use App\Propiedades;
   $propiedades= Propiedades::all();

   if($_SERVER['SCRIPT_NAME']==='/anuncios.php'){
    $propiedades= Propiedades::all();
   }else{
    $propiedades= Propiedades::get(3);
   }
?>

<div class="contenedor-anuncios">
    <?php
     foreach($propiedades as $propiedad){?>
    
        <div class="anuncio">
                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen;?>" alt="anuncio1">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->banios; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>
                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">
                    Ver Propiedad
                </a>
            </div> <!--contenido-anuncio-->
        </div> <!--anuncio-->
        <?php
            }
        ?>
       
    </div>