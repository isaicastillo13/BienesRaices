<?php
    require 'include/app.php';
    incluirTemplates('header');
?>
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>
    <h2>Llene el Formulario de Contacto</h2>
    <form action="" class="formulario">
        <fieldset>
            <legend>Informacion Personal</legend>

            <label for="Nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="Nombre">

            <label for="e-mail">E-Mail</label>
            <input type="email" placeholder="Tu Correo" id="e-mail">

            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu Teléfono" id="telefono">

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion Sobre la Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select name="" id="opciones">
                <option value="" disabled selected>--Selecciones--</option>
                <option value="Comprar">Comprar</option>
                <option value="Vender">Vender</option>
            </select>
            <label for="presupuesto">Presupuesto</label>
            <input type="number" min="1000" placeholder="Precio o Presupuesto" id="presupuesto">

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-tel">Whatsapp</label>
                <input type="radio" name="contacto" value="telefono" id="contactar-tel">

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto" value="email" id="contactar-emial">
            </div>

            <p>Si eligio telefono, elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha: </label>
            <input type="date" id="fecha">

            <label for="hora">Hora: </label>
            <input type="time" id="hora" min="09:00" max="18:00">


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

<?php
incluirTemplates('footer');?>

