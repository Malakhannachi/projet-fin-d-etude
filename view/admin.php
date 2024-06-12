<?php ob_start(); ?>
<h1>Liste des joueurs</h1>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>id_Devis</th>
            <th>Nom du client</th>
            <th>Date</th>
            <th>Besoin</th>
            <th>Montant</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $joueur) { ?>
                <tr>
                    <td><a href="index.php?action=listJoueurEquipe&id=<?= $joueur['id_joueur'] ?>"> 
                    <?= $joueur['nom_J'] ?></a>
                    <a href="index.php?action=delJoueur&id=<?= $joueur['id_joueur'] ?>" >
        <button type="button" class="btn-delete">Supprimer</button>
    </a>
                </td>
                
                    <td><?= $joueur['prenom'] ?></td>
                    <td><?= $joueur['date_N'] ?></td>
                    <td><?= $joueur['id_pays'] ?></td>
                    <td><?= $joueur['nom_P'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php
$titre = "liste des joueurs";
$contenu = ob_get_clean();

require 'template.php';


