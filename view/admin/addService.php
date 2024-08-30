<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Ajouter un service</h1>
    
</section>

<section id="devis" class="devis-background1">
    <div class="devis-content">
        <h2 class="title-devis1">Ajouter un service</h2>
        <p class="text-devis1">Ajustez les détails de votre service pour que notre équipe puisse mieux vous assister.</p>
    </div> 
    <div class="form devis-background2">
        <h2 class="title-devis1">Modifier un service</h2>
        <form action="index.php?action=addService" method="post" class="formulaire" enctype="multipart/form-data">
            
            <div class="list">
                <label for="nom_Ser" class="label-devis">Nom de service</label>
                <input type="text" name="nom_Ser" id="nom_Ser" class="input" placeholder="nom" value="">
            </div>
            <div class="list">
                <label for="id_Cat" class="label-devis">sélectionnez un service</label>
                <select name="id_Cat" id="id_Cat" class="select">
                    <?php foreach($categories as $cat): ?>
                        <!-- comparer id de categorie avec id de service  pour selectionner la categorie -->
                    <option value="<?php echo $cat['id_Cat'] ?>"><?php echo $cat['nom_Cat'] ?></option>
                    <?php endforeach; ?>
    
                </select>
            </div>
            <div class="list">
                <label for="besoin" class="label-devis">description de service</label>
                <textarea name="description" id="description" rows="5" placeholder="description"></textarea>
            </div>
            <div class="list">
                <label for="image" class="label-devis">Inserer une image</label>
                <input type="file" name="image" id="image" class="input" placeholder="image">
            </div>
            <div class="list">
                <button class="btn-avis" type="submit" name="submit">Ajouter un service <span>&#x2197;</span></button>
            </div>
        </form>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";
?>
