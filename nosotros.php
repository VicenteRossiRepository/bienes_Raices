<?php

require 'includes/funciones.php';

incluirTemplate('header');

?> 
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quod culpa debitis adipisci cum unde ex dolor soluta recusandae excepturi tempora ut, eligendi, atque tempore libero id odit, dolores tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias nisi odit, pariatur explicabo quidem neque expedita? Sapiente autem molestias illo eligendi error ipsa fugiat recusandae molestiae illum, ipsam quaerat doloribus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti enim dolores, tempora quisquam sint assumenda iure ipsam, eligendi quibusdam a, aliquid laboriosam soluta ea velit? Soluta dignissimos quaerat delectus eaque.</p>

                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque suscipit tempora cum quis cupiditate minima amet molestias officia aliquam. Voluptatum eaque optio ipsa voluptatem nihil necessitatibus porro perferendis quod! Nemo?</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium, et eum eligendi doloremque
                    quo porro dolore non sequi quisquam minus, quam fugiat voluptate nesciunt iure veritatis maiores
                    consectetur quibusdam.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium, et eum eligendi doloremque
                    quo porro dolore non sequi quisquam minus, quam fugiat voluptate nesciunt iure veritatis maiores
                    consectetur quibusdam.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel laudantium, et eum eligendi doloremque
                    quo porro dolore non sequi quisquam minus, quam fugiat voluptate nesciunt iure veritatis maiores
                    consectetur quibusdam.</p>
            </div>
        </div>
    </section>

    <?php incluirTemplate('footer'); ?> 