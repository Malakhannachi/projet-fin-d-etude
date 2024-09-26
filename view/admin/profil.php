Bienvenue <?php echo $_SESSION['user']['pseudo']; ?> !
<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Modifier Devis</h1>
    <p class="text-hero">Modifiez Votre Devis Sur-Mesure</p>
</section>

<section id="devis" class="devis-background1">
    <div class="devis-content">
        <h2 class="title-devis1">Mettez à jour votre demande de devis</h2>
        <p class="text-devis1">Ajustez les détails de votre devis pour que notre équipe puisse mieux vous assister.</p>
    </div> 
    <div class="form devis-background2">
        <h2 class="title-devis1">Modifier un devis</h2>
        <form action="index.php?action=editDevis&id=<?= htmlspecialchars($devis['id_Dem']) ?>" method="post" class="formulaire">
            <div class="form-group">
                <div class="nom">
                    <label for="nom" class="label-devis">Nom</label>
                    <input type="text" name="nom" id="nom" class="input" placeholder="nom" value="<?= htmlspecialchars($devis['nom']) ?>">
                </div>
                <div class="nom">
                    <label for="prenom" class="label-devis">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom" value="<?= htmlspecialchars($devis['prenom']) ?>">
                </div>
            </div>
            <div class="list">
                <label for="telephone" class="label-devis">Numéro de téléphone</label>
                <input type="tel" name="tel" id="telephone" class="input" placeholder="06 00 00 00 00" value="<?= htmlspecialchars($devis['tel']) ?>">
            </div>
            <div class="list">
                <label for="email" class="label-devis">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="email" value="<?= htmlspecialchars($devis['email']) ?>">
            </div>
            <div class="list">
                <label for="id_services" class="label-devis">sélectionnez un service</label>
                <select name="id_services" id="id_services" class="select">
                    <option value="1" <?= $devis['id_Services'] == 1 ? 'selected' : '' ?>>Service 1</option>
                    <option value="2" <?= $devis['id_Services'] == 2 ? 'selected' : '' ?>>Service 2</option>
                    <option value="3" <?= $devis['id_Services'] == 3 ? 'selected' : '' ?>>Service 3</option>
                    <option value="4" <?= $devis['id_Services'] == 4 ? 'selected' : '' ?>>Service 4</option>
                    <option value="5" <?= $devis['id_Services'] == 5 ? 'selected' : '' ?>>Service 5</option>
                </select>
            </div>
            <div class="list">
                <label for="besoin" class="label-devis">Votre besoin</label>
                <textarea name="besoin" id="besoin" rows="5" placeholder="Votre besoin"><?= htmlspecialchars($devis['besoin']) ?></textarea>
            </div>
            <div class="list">
                <button class="btn-avis" type="submit">Mettre à jour <span>&#x2197;</span></button>
            </div>
        </form>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";
?>
