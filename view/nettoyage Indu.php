<?php ob_start(); ?>

<section id="services-industriaux">
    
    <h2>Nettoyage Industriel Professionnel et Sur Mesure</h2>
    <img src="public/image/agent-nettoyage-industriel.jpg" alt="nettoyage industriel">
    <p>
        Nous offrons des services de nettoyage industriel adaptés à chaque entreprise, couvrant le nettoyage des sols, des machines, des systèmes de ventilation, et des zones sensibles. Nos techniques avancées et nos produits écologiques assurent un environnement propre, sûr et conforme aux normes. Que ce soit pour un entretien régulier ou un nettoyage spécialisé, notre équipe est prête à répondre à vos besoins spécifiques.
    </p>
    <a href="devis.php" ><button class="btn">En savoir plus</button></a>


</section>
<?php
$contenu = ob_get_clean();
require "template/template.php";