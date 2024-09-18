<?php ob_start(); ?>


<section id="success">
    <div class="success-content">
        <h2 class="title-suc">Merci pour votre demande de devis!</h2>
        <p class="text-suc">Nous avons bien reçu votre demande et nous vous contacterons sous peu.</p>
        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" class="checkmark">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
        </svg>
        <a href="index.php?action=accueil"><button class="btn-suc">Retour à l'accueil</button></a>


    
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";

