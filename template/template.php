<?php

if (isset($_SESSION['user']['role'])) {
    $role = $_SESSION['user']['role'];
} else {
    $role = 'user';
}
// ajoter l'encodage html pour afficher les mots avec accents
header('Content-Type: text/html; charset=iso8859'); 
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: text/html; charset=iso-8859-1');

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="iso-8859-1" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel = "stylesheet" href = "frontend/style.css" />
<title>PFE</title>

<body>
<?php 
   // afficher le lien pour se connecter
    if ( isset ($_SESSION["user"])) {     ?>          
        <a href="index.php?action=logout">Se déconnecter</a>
   <?php }   else { ?>
        <a href="index.php?action=login">Se connecter</a>
        <a href="index.php?action=register">S'incrire</a>

   <?php } ?> 
   <div id="nav">
    <nav>
        <a href="index.php?action=accueil">Accueil</a>
        <a href="index.php?action=listeCat">Services</a>
        <a href="index.php?action=devis">Devis</a>
        <a href="index.php?action=listeCat">Contact</a> 
        <?php if ($role == "admin") { ?> 
            <a href="index.php?action=admin">Admin</a> <?php } ?>
       
    </nav>
   </div>
 
    <main>
     <div id="contenu">
           <?= $contenu ?>
    </div>
    
    </main>
    </div>
</body>
</html>