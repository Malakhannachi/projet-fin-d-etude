
<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Liste des  devis</h1>
</section>
<section class="all-devis">
<table class="table-devis">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Besoin</th>
            <th>Date devis</th>
            <th>Nbre de jour</th>
            <th>Prix HTVA</th>
            <th>Actions</th>
    
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dev as $devi): ?>
            <tr>
                <td><?php echo htmlspecialchars($devi['id_devis']); ?></td>
                <td><?php echo htmlspecialchars($devi['nom']); ?></td>
                <td><?php echo htmlspecialchars($devi['prenom']); ?></td>
                <td><?php echo htmlspecialchars($devi['tel']); ?></td>
                <td><?php echo htmlspecialchars($devi['email']); ?></td>
                <td><?php echo htmlspecialchars($devi['besoin']); ?></td>
                <td><?php echo htmlspecialchars($devi['date_dev']); ?></td>
                <td><?php echo htmlspecialchars($devi['qte']); ?></td>
                <td><?php echo htmlspecialchars($devi['prix_ht']); ?></td>
                
                <td>
                    
                    <a href="index.php?action=pageOffre&id=<?php echo $devi['id_devis']; ?>"> <i class="fa-solid fa-eye"></i></a>
                    <a href="index.php?action=sendDevis&id=<?php echo $devi['id_devis']; ?>"><i class="fa-regular fa-paper-plane"></i></a>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>


<?php $contenu = ob_get_clean(); ?>
<?php require "template/template.php"; ?>
