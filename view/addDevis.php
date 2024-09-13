

<p>Bienvenue, <?= ($_SESSION["user"]["nom"]) ?>!</p>   <!-- afficher le nom d'admin-->
<p>Vous pouvez ajouter un Devis</p>

<!-- formulaire pour ajouter un devis -->
 

<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Devis Gratuit</h1>
        <p class="text-hero">Recevez Votre Devis Sur-Mesure</p>
    
</section>

 <section id="devis" class="devis-background1">
    <div class="devis-content">
    <h2 class="title-devis1">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis1">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div> 
    <div class="form devis-background2" >
    <h2 class="title-devis1">Demander un devis</h2>
            <form action="index.php?action=addDevis" method="post" class="formulaire">
                <div class="form-group " >
                    <div class="nom">
                        <label for="nom" class="label-devis">Nom</label>
                        <input type="text" name="nom" id="nom" class="input" placeholder="nom">
                    </div>
                    <div class="nom">
                        <label for="prenom" class="label-devis">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom">
                    </div>
                </div>
                <div class="list">
                    <label for="telephone"  class="label-devis">Numéro de téléphone</label>
                    <input type="tel" name="tel" id="telephone" class="input" placeholder="06 00 00 00 00">
                </div>
                <div class="list">
                    <label for="email" class="label-devis">Email</label>
                    <input type="email" name="email" id="email" class="input" placeholder="email">
                </div>
                <div class="list">
                    <label for="id_services" class="label-devis">sélectionnez un service</label>
                    <select name="" id="id_services" class="input">
                        <option value="">sélectionnez un service</option>
                        <option value="1">Service 1</option>
                        <option value="2">Service 2</option>
                        <option value="3">Service 3</option>
                        <option value="4">Service 4</option>
                        <option value="5">Service 5</option>

                    </select>
                </div>
                <div class="list">
                    <label for="besoin"  class="label-devis">Votre besoin</label>
                    <textarea name="besoin" id="bsoin" rows="5" placeholder="Votre besoin" > </textarea>
                </div>
                <div class="list">
                    <button class="btn-avis" type="submit">Envoyer <span>&#x2197;</span></button>
                </div>
            </form>
        </div>

</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";
