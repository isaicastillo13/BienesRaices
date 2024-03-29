<?php
    require '../include/app.php';
    estaAutenticado();

 use App\Propiedades;
 use App\Vendedor;

 $propiedades = Propiedades :: all();
 $vendedores = Vendedor :: all();

 $vendedor = new Vendedor();
 $propiedad = new Propiedades();
 
//Muestra mensaje condicional
$resultado=$_GET['resultado'] ?? null;


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

        $tipo = $_POST['tipo'];
        if(validarTipoContenido($tipo)){

            if($tipo=='vendedor'){
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();  
            }else if($tipo=='vendedor'){
                $propiedades = Propiedades::find($id);
                $propiedades->eliminar();  
            }
        } 
    }

//Incluye un template
incluirTemplates('header');

?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php 
        $mensaje=mostrarMensaje(intval($resultado));
        if($mensaje){ ?>
        <p class="alerta exito"><?php echo s($mensaje) ?></p>

       <?php } ?>
    
    <h2>Propiedades</h2>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo(a) Vendedor(a)</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
                <tbody> 
                    
                <!--Mostrar los resultados-->
                <?php foreach($propiedades as $propiedad) :?>
                    <tr>
                        <td><?php echo $propiedad->id?></td>
                        <td><?php echo $propiedad->titulo?></td>
                        <td><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad->imagen?>" alt="imagen-tabla"></td>
                        <td>$<?php echo $propiedad->precio?></td>
                        <td>

                        <form class="w-100" method="POST" >
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                            <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad->id?>" class="boton-amarillo" >Actualizar</a>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </tr>
        </thead>
    </table>


    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
                <tbody> 
                    
                <!--Mostrar los resultados-->
                <?php foreach($vendedores as $vendedor) :?>
                  
                    <tr>
                        <td><?php echo $vendedor->id?></td>
                        <td><?php echo $vendedor->nombre ." ".$vendedor->apellido?></td>
                        <td><?php echo $vendedor->telefono?></td>
                        <td>

                        <form class="w-100" method="POST" >
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                            <a href="../admin/vendedores/actualizar.php?id=<?php echo $vendedor->id?>" class="boton-amarillo" >Actualizar</a>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </tr>
        </thead>
    </table>
    
</main>

<?php

//Cerra la conexion
incluirTemplates('footer');
?>