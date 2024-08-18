<?php ob_start();?>

<section id="hero-devis">    
    
        <h1 class="devis-hero">Ajouter un avis</h1>
        <p class="text-hero">Votre satisfaction est notre priorité. Partagez votre avis !</p>

</section>

<section id="devis" class="devis-background1">
    <div class="devis-content">
    <h2 class="title-devis1">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis1">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div> 
    <div class="form devis-background2" >
    <h2 class="title-devis1">Ajouter un Avis</h2>
            <form action="index.php?action=addAvis" method="post" class="formulaire">
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
                    <label for="id_services" class="label-devis">Note</label>
                    <select name=" note" id="id_services" class="input">
                        <option value="">Notez pour nous</option>
                        <option value="1"><span class='stars'>&#9733;</span></option>
                        <option value="2"><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="3"><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="4"><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="5"><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                    </select>
                </div>
                <div class="list">
                    <label for="besoin"  class="label-devis">Votre Avis</label>
                    <textarea name="commentaire" id="bsoin" rows="5" placeholder="Votre besoin" > </textarea>
                </div>
                <div class="nom">
                        <label for="image" class="label-devis">Prenom</label>
                        <input type="file" name="image" id="image" class="input" placeholder="image">
                        <?php if (!empty($_SESSION["errors"]['image'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['image']; ?></div>
                        <?php endif; ?>
                    </div>
                <div class="list">
                    <button class="btn-avis" type="submit" name="submit">Envoyer <span>&#x2197;</span></button>
                </div>
            </form>
        </div>

</section>

</section>


<?php
$contenu = ob_get_clean();
require "template/template.php";
