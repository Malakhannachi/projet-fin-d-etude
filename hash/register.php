<?php ob_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s'inscrire</title>
</head>
<body>
    <h1>s'inscrire</h1>
    <form action="index.php?action=register" method="post">
        
        <label for="pseudo">Nom</label>
        <input type="text" name="nom" id="pseudo"><br>
        <label for="pseudo">Prenom</label>
        <input type="text" name="prenom" id="pseudo"><br>

        <label for="email">Mail</label>
        <input type="email" name="email" id="email" placeholder="email"><br>

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp"><br>

        <label for="mdp2"> Confirmation de mot de passe</label>
        <input type="password" name="mdp2" id="mdp2"><br>

        <input type="submit" name="submit" value="s'inscrire">
    </form>
</body>
</html>
<?php
$contenu = ob_get_clean();
require "template/template.php";