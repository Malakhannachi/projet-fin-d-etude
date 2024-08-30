
<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero">Liste des services</h1>
    <a href="index.php?action=addService" ><button class="btn">Ajouter un service <i class="fa-solid fa-plus"></i></button></a>

</section>


<section class="all-devis">
<table class="table-devis">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom de service</th>
            <th>Description</th>
            <th>Image</th>
            <th>nom de catégorie</th>
            
        </tr>
    </thead>
    <tbody>
        <!-- afficher liste des services via base de données -->
        <?php foreach ($services as $ser): ?>
            <tr>
                <td><?php echo htmlspecialchars($ser['id_Services']); ?></td>
                <td><?php echo htmlspecialchars($ser['nom_Ser']); ?></td>
                <td><?php echo htmlspecialchars($ser['description']); ?></td>
                <td><img class="ser-img" src="public/image/<?php echo htmlspecialchars($ser['image']); ?>" alt="Image of <?php echo htmlspecialchars($ser['nom_Ser']); ?>" ></td>
                <td><?php echo htmlspecialchars($ser['nom_Cat']); ?></td>
                
                <td>
                    <a href="index.php?action=editServices&id=<?php echo $ser['id_Services']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="index.php?action=deleteService&id=<?php echo $ser['id_Services']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')"><i class="fa-solid fa-trash"></i></a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</section>

<?php $contenu = ob_get_clean(); ?>
<?php require "template/template.php"; ?>
