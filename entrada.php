<?php

require 'includes/funciones.php';

incluirTemplate('header');

?> 
    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <p>Escrito el: <span>20/20/2021</span> por: <span>Admin</span></p>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore fugiat rem quo iure impedit. Veritatis dicta cumque, doloribus animi repellat, at laborum recusandae laudantium ex ad quam dolore quaerat quas!
                Exercitationem corrupti quam error praesentium omnis optio velit minus incidunt placeat sit harum accusantium autem, labore corporis, aliquam quasi repellendus sunt. Impedit, animi dolor sed corrupti repellendus eos dolorem cum.
                Libero quaerat sequi iure pariatur harum accusamus vitae recusandae, qui neque quos ex iusto, illum unde ullam dolorum. Recusandae consequuntur sed doloremque eaque quis numquam omnis reiciendis quod sapiente molestias.
                Consequatur mollitia incidunt sequi earum! Obcaecati neque animi ea, odio necessitatibus eos eaque sequi rerum? Deleniti quia error repellendus, autem quaerat ad quod. Optio nostrum qui dicta architecto quam aspernatur?
                Saepe, dolore maxime? Nam, consequatur nihil qui reiciendis voluptatem dignissimos incidunt voluptate repellat, natus officiis sapiente id quam sed soluta quas libero doloribus est ea cupiditate quae! Possimus, quia. Consectetur?
            </p>
        </div>
    </main>

   <?php incluirTemplate('footer'); ?> 