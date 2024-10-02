<?php ob_start(); ?>

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
                        <?php if (!empty($_SESSION["errors"]['nom'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['nom']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="nom">
                        <label for="prenom" class="label-devis">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom">
                        <?php if (!empty($_SESSION["errors"]['prenom'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['prenom']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="list">
                    <label for="telephone"  class="label-devis">Numéro de téléphone</label>
                    <input type="tel" name="telephone" id="telephone" class="input" placeholder="06 00 00 00 00">
                </div>
                <div class="list">
                    <label for="email" class="label-devis">Email</label>
                    <input type="text" name="email" id="email" class="input" placeholder="email">
                </div>
                <div class="list">
                    <label for="adresse"  class="label-devis">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="input" placeholder="adresse">
                </div>
                <div class="form-group " >
                    <div class="nom">
                        <label for="ville" class="label-devis">Ville</label>
                        <input type="text" name="ville" id="ville" class="input" placeholder="ville">
                        <?php if (!empty($_SESSION["errors"]['ville'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['ville']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="nom">
                        <label for="codePostal" class="label-devis">Code Postal</label>
                        <input type="number" name="codePostal" id="codePostal" class="input" placeholder="code postal">
                        <?php if (!empty($_SESSION["errors"]['codePostal'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['codePostal']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="list">
                    <label for="id_services" class="label-devis">sélectionnez un service</label>
                    <select name=" liste_Service" id="id_services" class="input">
                        <option value="">sélectionnez un service</option>
                        <?php foreach ($services as $ser) : ?>  <!-- boucle pour afficher liste des services -->
                        <option value="<?php echo $ser['id_Services']; ?>"><?php echo htmlspecialchars($ser['nom_Ser']?? ''); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="list">
                    <label for="besoin"  class="label-devis">Votre besoin</label>
                    <textarea name="besoin" id="bsoin" rows="5" placeholder="Votre besoin" > </textarea>
                </div>
                <div class="list">
                    <button class="btn-avis" type="submit" name="submit">Envoyer <span>&#x2197;</span></button>
                </div>
            </form>
        </div>

</section>

<?php
unset($_SESSION["errors"]); // vider les erreurs
$contenu = ob_get_clean();
require "template/template.php";