<?php ob_start(); ?>
<section id="devis">
    <div id="dev">
        <picture>
            <img src="public/image/im6.jpg" alt="image de devis"/>
        </picture>
        <p class="p1">
            <strong>Obtenez rapidement un devis personnalisé en remplissant notre formulaire en ligne</strong>
        </p>
        <div id="form">
            <form action="index.php?action=devis" method="post">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="nom">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="prenom">
                <label for="numéro de téléphone">Numéro de téléphone</label>
                <input type="tel" name="tel" id="tel" placeholder="06 00 00 00 00">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="besoin">Votre besoin</label>
                <textarea name="besoin" id="bsoin">Votre besoin</textarea>

            </form>
        </div>
        
<section>

<?php
$contenu = ob_get_clean();
require "template/template.php";