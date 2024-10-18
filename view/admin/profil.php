
<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Modifier Profil</h1>
    <p class="text-hero">Modifiez Votre Profil</p>
</section>

<section id="devis" class="devis-background1">
    <div class="infosBienvenueProfil">
        <div class="BienvenuePseudo" >
            Bienvenue <?php echo $_SESSION['user']['pseudo']; ?> !
        </div>
        <div class="devis-content">
            <h2 class="title-devis1">Mettez à jour votre profil</h2>
            <p class="text-devis1">Ajustez les détails de votre devis pour que notre équipe puisse mieux vous assister.</p>
        </div>
    </div>
    <div class="form devis-background2">
        <h2 class="title-devis1">Modifier un profil</h2>
        <form action="index.php?action=profil&id=<?= htmlspecialchars($profil['id_User']) ?>" method="post" class="formulaire" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" pour l'image -->
            <div class="form-group">
                <div class="nom">
                    <label for="pseudo" class="label-devis">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="input" placeholder="pseudo" value="<?= htmlspecialchars($profil['pseudo']) ?>">
                    <?php if (!empty($_SESSION["errors"]['pseudo'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['pseudo']; ?></div>
                        <?php endif; ?>
                </div>
                
            </div>
            
            <div class="list">
                <label for="email" class="label-devis">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="email" value="<?= htmlspecialchars($profil['email']) ?>">
                <?php if (!empty($_SESSION["errors"]['email'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['email']; ?></div>
                        <?php endif; ?>
            </div>
            <div class="list">
                <label for="mdp" class="label-devis">Mot de passe</label>
                <input type="mdp" name="mdp" id="mdp" class="input" placeholder="mdp" value="">
                <?php if (!empty($_SESSION["errors"]['mdp'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['mdp']; ?></div>
                        <?php endif; ?>
            </div>
            <div class="list">
                <label for="role" class="label-devis">Role</label>
                <input type="role" name="role" id="role" class="input" placeholder="role" value="<?= htmlspecialchars($profil['role']) ?>">
                <?php if (!empty($_SESSION["errors"]['role'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['role']; ?></div>
                        <?php endif; ?>
            </div>
            <div class="nom">
                        <label for="image" class="label-devis">Image</label>
                        <input type="file" name="image" id="image" class="input" placeholder="image">
                        <?php if (!empty($_SESSION["errors"]['image'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['image']; ?></div>
                        <?php endif; ?>
            </div>
            
            <div class="list">
                <button class="btn-avis" type="submit" name="submit">Mettre à jour <span>&#x2197;</span></button>
            </div>
        </form>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";
?>
