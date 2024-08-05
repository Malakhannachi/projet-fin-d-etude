<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
        <!-- <link rel = "stylesheet" href = "frontend/style.css" /> -->
        <title>PFE</title>
        <style>
            body {
                margin: 0;
                padding: 0;
            }
            .nav{
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                padding: 10px 50px;
                position: fixed;
                background-color: white;
                opacity: 0.8;
                
            }
            .logo{
                width: 30px;
                margin-left: 10px;
            }
            .item{
                text-decoration: none;
                color: #1B2D3D;
                padding: 10px;
            }
        </style>
</head>

<body>

<?php

if (isset($_SESSION['user']['role'])) {
    $role = $_SESSION['user']['role'];
} else {
    $role = 'user';
}
?>
    <nav class="nav">
        <picture >
            <img class="logo" src="public/image/logo_mk.png" alt="logo"/>
        </picture>
        <div class="sec">
            <a href="index.php?action=accueil" class="item">Accueil</a>
            <a href="index.php?action=listeServ" class="item">Services</a>
            <a href="index.php?action=devis"class="item">Devis</a>
            <a href="index.php?action=listeCont" class="item">Contact</a> 
            <?php if ($role == "admin") { ?> 
                <a href="index.php?action=admin">Admin</a> <?php } ?> 
        </div>
            
        <!-- afficher le lien pour se connecter ou s'incrire -->
         <div class="login">
            <?php
                    if ( isset ($_SESSION["user"])) {     ?>          
                        <a href="index.php?action=logout" class="item">Se déconnecter</a>
                <?php }   else { ?>
                        <a href="index.php?action=login" class="item">Se connecter</a>
                        <a href="index.php?action=register" class="item">S'incrire</a>

                <?php } ?> 
        </div>
       
    </nav>
   
 
    <main>
     <div id="contenu">
           <?= $contenu ?>
    </div>
    
    </main>
    </div>
</body>
</html>