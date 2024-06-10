<?php ob_start(); ?>
<section id="accueil">
    <div id="contenu">
        <picture>
            <img src="public/image/images.jpg" alt="image d'accueil"/>
        </picture>
        <p class="lead">
            <strong>Nous sommes là pour vous faciliter la vie !</strong>
        </p>
        <p class="par">
        Des services de qualité pour votre maison et votre entreprise : nettoyage, bricolage, installations électriques et vidéosurveillance .
        </p>
    </div>
<section>

<section id="services">
    <div id="melieux">
        <picture>
            <img src="public/image/image2.jpg" alt="image de démanegement"/>
            <p>
            Déménagez en toute sérénité avec notre service rapide, sécurisé et professionnel
            <a href="services.php" button >Voi plus</a>
            </p>
        </picture>
         

</section>







<?php
$contenu = ob_get_clean();
require "template/template.php";