<?php ob_start(); ?>

<section id="hero-devis">
    <div class="success-content">
        <h2 class="title-success">Votre avis compte énormément pour nous !</h2>
        <p class="text-success">Chaque retour est une opportunité pour nous de grandir et de mieux vous servir</p>
        <a href="/project-malak/index.php?action=accueil"><button class="btn-success">Retour à l'accueil</button></a>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";