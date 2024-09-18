<?php ob_start(); 
$errors = $_SESSION["errors"] ?? []; //afficher les erreurs 

?> 
<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Inscription </h1>
    
</section>

 <section id="devis" class="devis-background1">
     
    <div class="form devis-background2" >
    <h2 class="title-devis1">Inscription</h2>

            <form action="index.php?action=register" method="post" class="formulaire">
                <div class="form-group " >
                <div class="nom">
                        <label for="nom" class="label-devis">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" class="input" placeholder="Pseudo">
                        <?php if (!empty($errors['pseudo'])): ?>
                            <div class="error"><?php echo $errors['pseudo']; ?></div>
                        <?php endif; ?> 
                    </div>
                    
                </div>
                <div class="list">
                    <label for="email" class="label-login">Email</label>
                    <input type="email" name="email" id="email" placeholder="email"class="input-login"><br>
                    <?php if(!empty($errors['email'])): ?>
                        <div class="error"><?php echo $errors['email']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="list">
                    <label for="mdp" class="label-login">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="input-login"><br>
                    <?php if(!empty($errors['mdp'])): ?>
                        <div class="error"><?php echo $errors['mdp']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="list">
                    <label for="mdp2"class="label-login"> Confirmation de mot de passe</label>
                    <input type="password" name="mdp2" id="mdp2" class="input-login"><br>
                    <?php if(!empty($errors['mdp2'])): ?>
                        <div class="error"><?php echo $errors['mdp2']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="cgu-register">
                <input type="checkbox" id="cgu" name="cgu" value="accepted">
                <label for="cgu" class="cgu-label">J'accepte les <a class="cgu-link" href="index.php?action=cgu">Conditions Générales d'Utilisation</a></label>
                <?php if (isset($errors['cgu'])): ?>
                    <div class="error"><?= $errors['cgu']; ?></div>
                <?php endif; ?>
            </div>

                    <button type="submit" name="submit" class="btn">S'inscrire</button>
                </div>

            </form>
   </div>
</section>


<?php
unset($_SESSION["errors"]);
$contenu = ob_get_clean();
require "template/template.php";