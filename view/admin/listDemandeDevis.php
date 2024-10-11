
<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Liste des demandes devis</h1>
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
            <th>Date demande devis </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($devis as $devi): ?>
            <tr>
                <td><?php echo htmlspecialchars($devi['id_Dem']); ?></td>
                <td><?php echo htmlspecialchars($devi['nom']); ?></td>
                <td><?php echo htmlspecialchars($devi['prenom']); ?></td>
                <td><?php echo htmlspecialchars($devi['tel']); ?></td>
                <td><?php echo htmlspecialchars($devi['email']); ?></td>
                <td><?php echo htmlspecialchars($devi['besoin']); ?></td>
                <td><?php echo htmlspecialchars($devi['date_Dem']); ?></td>
                <td>
                    <a href="index.php?action=editDevis&id=<?php echo $devi['id_Dem']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="index.php?action=deleteDevis&id=<?php echo $devi['id_Dem']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce devis ?')"><i class="fa-solid fa-trash"></i></a>
                </td>
                <?php if ($_SESSION['user']['role']=="admin")
                {
                    ?>
                <td>
                    <button><a href="index.php?action=traitmentDevis&id=<?php echo $devi['id_Dem']; ?>"> Traiter</a>
                    </button>
                </td>
                <?php
                } ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require "template/template.php"; ?>
