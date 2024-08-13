<?php ob_start(); ?>

<section id="services-industriaux">
    
    <h2>Déménagement Professionnel et Efficace</h2>
    <img src="public/image/dem2.webp" alt="nettoyage industriel">
    <p>
        Notre service de déménagement est conçu pour rendre votre transition aussi fluide que possible. Nous prenons en charge chaque étape, du démontage et emballage de vos biens jusqu’au transport et réinstallation dans votre nouveau domicile ou bureau. Notre équipe expérimentée s’assure que vos effets personnels arrivent en toute sécurité, grâce à des techniques de protection adaptées et des véhicules équipés. Que vous déménagiez localement ou sur de longues distances, nous offrons un service sur mesure pour répondre à vos besoins spécifiques.
    </p>
    <button></button>


</section>
<?php
$contenu = ob_get_clean();
require "template/template.php";