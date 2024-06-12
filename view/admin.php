<?php ob_start();?>

<table>
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
            $date_Devis = (new DateTime($msg['date_Devis']))->format('d/m/Y H:i');   // changer le format de la datetime en francais 
            ?>
            <tr>
                <td><?= $dev['id_Devis'] ?></td>
                <td><?= $date_Devis ?></td>
                <td><?= $dev['besoin'] ?></td>
                <?= $dev['nom'] ?></a>
            </tr>
            <?php } ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
require "template/template.php";