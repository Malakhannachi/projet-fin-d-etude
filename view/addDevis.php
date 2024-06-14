<?php ob_start(); ?>

<p>Bienvenue, <?= ($_SESSION["user"]["nom"]) ?>!</p>   <!-- afficher le nom d'admin-->
<p>Vous pouvez ajouter un Devis</p>

<!-- formulaire pour ajouter un devis -->
<form action="index.php?action=addDevis" method="post">
    <input type="datetime-local" name="date_Devis" placeholder="date">
    <input type="textarea" name="besoin" placeholder="besoin">
    <select name="id_User" id="id_User">       <!--liste roulant des users--> 
        <option value="">Sélectionnez un client</option>
            <?php
                
                while ($client = $id_User->fetch())
                {
                    echo "<option value=" . $client["id_User"] .">" . $client["nom"] . "</option>"; //liste des clients
                }
            ?>
        </select> 
    <input type="submit" name="submit" value="Ajouter">
</form>
<?php

$contenu = ob_get_clean();
require "template/template.php";
