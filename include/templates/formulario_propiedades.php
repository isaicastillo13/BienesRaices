<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="propiedades[titulo]" placeholder="Titulo Propiedad" value="<?php echo s($propiedades->titulo); ?>">


            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="propiedades[precio]" placeholder="Precio de la Propiedad" value="<?php echo s($propiedades->precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpg" name="propiedades[imagen]">
            
            <?php if($propiedades->imagen) { ?>
                <img src="/imagenes/<?php echo $propiedades->imagen ?>" class="imagen-small">
            <?php } ?>


            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="propiedades[descripcion]"><?php echo s($propiedades->descripcion); ?></textarea>
</fieldset>

<fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="propiedades[habitaciones]" placeholder="Ej: 1" min="1" value="<?php echo s($propiedades->habitaciones); ?>">


            <label for="banios">Baños:</label>
            <input type="number" id="banios" name="propiedades[banios]" placeholder="Ej: 1" min="1" value="<?php echo s($propiedades->banios); ?>">


            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="propiedades[estacionamiento]" placeholder="Ej: 1" min="1" value="<?php echo s($propiedades->estacionamiento); ?>">
</fieldset>

<fieldset>
            <legend for="vendedores_id">Vendedor:</legend>
            <select id="vendedores_id" name="propiedades[vendedores_id]">
                <option value="" selected disabled>--Seleccione--</option>
            </select>
</fieldset>