<?php

require 'includes/funciones.php';

incluirTemplate('header');

?> 

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">

            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información personal</legend>

                <label for="txtNombre">Nombre</label>
                <input type="text" name="" id="txtNombre" placeholder="Tu nombre">
                
                <label for="txtEmail">E-mail</label>
                <input type="email" id="txtEmail" placeholder="Tu E-mail">
                
                <label for="txtTelefono">Teléfono</label>
                <input type="tel" id="txtTelefono" placeholder="Tu teléfono">
                
                <label for="txtMensaje">Mensaje: </label>
                <textarea id="txtMensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o compra: </label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="txtPresupuesto">Precio o presupuesto</label>
                <input type="number" id="txtPresupuesto" placeholder="Tu precio o presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="E-mail" id="contactar-email">
                </div>

                <p>Si eligio telefono, eliga la fecha y hora para ser contactado</p>

                <label for="txtfecha">Fecha</label>
                <input type="date" id="txtfecha">

                <label for="txthora">Hora:</label>
                <input type="time" id="txthora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>  
    </main>

   <?php incluirTemplate('footer'); ?> 