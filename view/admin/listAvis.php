<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">
    <h1 class="devis-hero">Liste des avis</h1>
    <a href="index.php?action=addService" ><button class="btn">Ajouter un avis <i class="fa-solid fa-plus"></i></button></a>

</section>
<section class="all-devis">
    <table class="table-devis">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>image</th>
                <th>Commentaire</th>
                <th>Note</th>
                <th>Date_Avis</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avis as $av): ?>
                <tr>
                    <td><?php echo htmlspecialchars($av['id_Avis']); ?></td>
                    <td><?php echo htmlspecialchars($av['nom']); ?></td>
                    <td><?php echo htmlspecialchars($av['prenom']); ?></td>
                    <td><img class="avis-img" src="public/image/<?php echo htmlspecialchars($av['image'] );?>" alt="<?php echo htmlspecialchars($av['nom'].' '.$av['prenom']);?>"/></td>
                    
                    <td><?php echo htmlspecialchars($av['commentaire']); ?></td>
                    <td><?php echo htmlspecialchars($av['note']); ?></td>
                    <td><?php echo htmlspecialchars($av['date_Avis']); ?></td>
                    <td>
                        <a href="index.php?action=editAvis&id=<?php echo $av['id_Avis']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="index.php?action=deleteAvis&id=<?php echo $av['id_Avis']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require "template/template.php"; ?>