
<?php ob_start(); ?>

<section id="hero-devis">    
    <h1 class="devis-hero">Liste des Avis</h1>
</section>

<section class="all-devis">

<a class="btn" href="/project-malak/index.php?action=addAvis">Ajouter un avis</a>

<table class="table-devis">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Note</th>
            <th>Commentaire</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($avis as $av) : ?>
            <tr>
                <td><?php echo htmlspecialchars($av['id_Avis']); ?></td>
                <td><?php echo htmlspecialchars($av['nom']); ?></td>
                <td><?php echo htmlspecialchars($av['prenom']); ?></td>
                <td><?php echo htmlspecialchars($av['email']); ?></td>
                <td><?php echo htmlspecialchars($av['tel']); ?></td>
                <td>
                    <?php for ($i = 0; $i < $av['note']; $i++) : ?>
                        <i class="fas fa-star stars"></i>
                    <?php endfor; ?>
                </td>
                <td>
                    <?php 
                    $comment = htmlspecialchars($av['commentaire']);
                    echo strlen($comment) > 40 ? substr($comment, 0, 40) . '...' : $comment;
                    ?>
                </td>
                <td><?php echo htmlspecialchars($av['date_Avis']); ?></td>
                <td>
                    <a href="index.php?action=editAvis&id=<?php echo $av['id_Avis']; ?>" ><i class="fas fa-edit"></i></a>
                    <a href="index.php?action=deleteAvis&id=<?php echo $av['id_Avis']; ?>"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet avis ?');"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
require "template/template.php";
?>
