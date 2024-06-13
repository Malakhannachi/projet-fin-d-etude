<?php ob_start();?>
<h2>Liste des devis</h2>

<!---- Afficher la liste des devis -->

<table border="1">
    <thead>
        <tr>
            <th>Id_Devis</th>
            <th>Nom du client</th>
            <th>Date</th>
            <th>Besoin</th>             
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $dev) //boucle pour afficher les messages
         {
            $date_Devis = (new DateTime($dev['date_Devis']))->format('d/m/Y H:i');   // changer le format de la datetime en francais 
            ?>
            <tr>
                <td><?= $dev['id_Devis'] ?></td>
                <td><?= $dev['nom'] ?></td>
                <td><?= $date_Devis ?></td>
                <td><?= $dev['besoin'] ?></td>
                
            </tr>
            <?php } ?>
    </tbody>
</table>
<h2>Avis des clients</h2>

<!---- Afficher la liste des avis-->

<table border="1">
    <thead>
        <tr>
            <th>Date_Avis</th>
            <th>Nom du client</th>
            <th>Commentaire</th>
            <th>Note</th>     
            <th>Services</th>              
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($requeteAvis->fetchAll() as $avi) //boucle pour afficher les messages
         {
            $date_Avis = (new DateTime($avi['date_Avis']))->format('d/m/Y H:i');   // changer le format de la datetime en francais 
            ?>
            <tr>
                <td><?= $date_Avis ?></td>
                <td><?= $avi['nom'] ?></td>
                <td><?= $avi['commentaire'] ?></td>  
                <td><?= $avi['note'] ?></td>
                <td><?= $avi['nom_Ser'] ?></td>
                
            </tr>
            <?php } ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
require "template/template.php";
