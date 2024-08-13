<?php ob_start(); ?>

<section id="services-industriaux">
    
    <h2>Nettoyage Particulier Personnalisé</h2>
    <img src="public/image/equipe-nettoyage.jpg.jpg" alt="equipe de nettoyage">
    <p>
        Nos services de nettoyage particulier sont conçus pour répondre aux besoins spécifiques de chaque foyer. Que ce soit pour un nettoyage régulier, un grand ménage de printemps, ou un nettoyage après travaux, notre équipe de professionnels utilise des produits respectueux de l’environnement pour garantir un intérieur impeccable. Nous adaptons nos prestations en fonction de vos attentes pour vous offrir un service sur mesure et de haute qualité.
    </p>


</section>
<?php
$contenu = ob_get_clean();
require "template/template.php";