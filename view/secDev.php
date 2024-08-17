<?php ob_start(); ?>

<section id="hero-devis">
    <div class="success-content">
        <h2 class="title-success">Merci pour votre demande de devis!</h2>
        <p class="text-success">Nous avons bien reçu votre demande et nous vous contacterons sous peu.</p>
        <a href="/project-malak/index.php?action=accueil"><button class="btn-success">Retour à l'accueil</button></a>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";