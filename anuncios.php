<?php
    require 'include/app.php';
    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h1>Anuncios</h1>
        <section class="seccion contenedor">
            <h2>Casas y Depas en Venta</h2>
            <?php 
             $limite = 10;
            include 'include/templates/anuncios.php'
            ?>
        </section>
    </main>

    <?php
incluirTemplates('footer');    ?>

