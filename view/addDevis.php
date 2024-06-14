<?php ob_start(); ?>

<p>Bienvenue, <?= ($_SESSION["membre"]["pseudo"]) ?>!</p>   <!-- afficher le pseudo de la personne connectée -->
<p>Vous pouvez ajouter un Devis</p>


<form action="index.php?action=addDevis" method="post">
    <input type="datetime-local" name="date_Devis" placeholder="date">
    <input type="textarea" name="besoin" placeholder="besoin">
    <input type="text" name="nom" placeholder="nom">
    <input type="submit" name="submit" value="Ajouter">
</form>
<?php

$contenu = ob_get_clean();
require "template/template.php";
