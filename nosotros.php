<?php
    require 'include/app.php';
    incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Nosotros</h1>
    <div class="nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>25 Años de Experiencia</blockquote>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et urna augue. Phasellus vel massa
                eros. In tortor lorem, egestas vel erat ac, condimentum interdum metus. Ut malesuada eros risus,
                vitae aliquet tortor euismod ac. Quisque egestas ac ex quis blandit. Ut at risus sed
                velit eleifend scelerisque et non quam. Sed augue justo, pretium sit amet velit ut, mollis molestie
                mi. Donec congue non lorem vitae tristique. Proin semper sem vel hendrerit fringilla. Nullam
                dapibus, neque et volutpat fringilla, nulla nunc semper nunc, a vehicula enim urna vel
                nisi. Curabitur facilisis congue metus, vel faucibus mauris mattis vitae. Duis id diam volutpat,
                rhoncus mi eget, ullamcorper lorem.
            </p>
            <p>
                Nulla in diam urna. Vestibulum vitae erat sit amet tortor pulvinar pulvinar sit amet sit amet dui.
                Nullam cursus ligula ex, non convallis tellus suscipit et. Integer mattis est arcu, lobortis
                interdum justo dapibus vel. Nulla facilisi. Nullam vel felis eros. Fusce ultrices, urna
                vel commodo tincidunt, magna ex tristique elit, eu tempor enim nisi vitae ante. Aenean vestibulum,
                diam in cursus egestas, nibh odio ultricies elit, eget fringilla orci dui eget ligula. Donec
                consectetur gravida pellentesque. Ut posuere massa sit amet risus ullamcorper condimentum.
            </p>
        </div>
    </div>


</main>
<section class="contenedor seccion">
    <h1>Mas Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis a aliquid, mollitia unde, nisi
                totam tenetur, dignissimos fugit id accusantium exercitationem molestiae! Quisquam, commodi. Tenetur
                explicabo aliquid natus vitae rem.

            </p>
        </div>


        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis a aliquid, mollitia unde, nisi
                totam tenetur, dignissimos fugit id accusantium exercitationem molestiae! Quisquam, commodi. Tenetur
                explicabo aliquid natus vitae rem.</p>
        </div>


        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis a aliquid, mollitia unde, nisi
                totam tenetur, dignissimos fugit id accusantium exercitationem molestiae! Quisquam, commodi. Tenetur
                explicabo aliquid natus vitae rem.</p>
        </div>
    </div>

</section>

<?php
incluirTemplates('footer');?>
