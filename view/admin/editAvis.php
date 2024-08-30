<?php ob_start();?>

<section id="hero-devis">    
    
        <h1 class="devis-hero">Modifier un avis</h1>
        

</section>

<section id="devis" class="devis-background1">
    <div class="devis-content">
    <h2 class="title-devis1">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis1">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div> 
    <div class="form devis-background2" >
    <h2 class="title-devis1">Ajouter un Avis</h2>
            <form action="index.php?action=editAvis&id=<?php echo htmlspecialchars($avis['id_Avis']) ?>" method="post" class="formulaire" enctype="multipart/form-data">
                <div class="form-group " >
                    <div class="nom">
                        <label for="nom" class="label-devis">Nom</label>
                        <input type="text" name="nom" id="nom" class="input" placeholder="nom" value="<?php echo htmlspecialchars($avis['nom']) ?>">
                        
                    </div>
                    <div class="nom">
                        <label for="prenom" class="label-devis">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom" value="<?php echo htmlspecialchars($avis['prenom']) ?>">
                        
                    </div>
                </div> 
                
                <div class="list">
                    <label for="id_services" class="label-devis">Note</label>
                    <select name="note" id="id_services" class="input">
                        <option value="">Notez pour nous</option>
                        
                        <option value="1" <?php if ($avis['note'] == 1) echo "selected" ?>><span class='stars'>&#9733;</span></option>
                        <option value="2" <?php if ($avis['note'] == 2) echo "selected" ?>><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="3" <?php if ($avis['note'] == 3) echo "selected" ?>><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="4"<?php if ($avis['note'] == 4) echo "selected" ?>><span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                        <option value="5" <?php if ($avis['note'] == 5) echo "selected" ?>><span class='stars'>&#9733;</> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span> <span class='stars'>&#9733;</span></option>
                    </select>
                </div>
                <div class="list">
                    <label for="commentaire" class="label-devis">Commentaire</label>
                    <textarea name="commentaire" id="commentaire" rows="5" placeholder="Votre commentaire">
                        <?php echo $avis['commentaire']; ?>
                    </textarea>
                </div>
                <div class="nom">
                        <label for="image" class="label-devis">Image</label>
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
