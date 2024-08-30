<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <link rel = "stylesheet" href = "public/css/style.css" />
        <title>PFE</title>
       
</head>

<body>

<?php

if (isset($_SESSION['user']['role'])) {
    $role = $_SESSION['user']['role'];
} else {
    $role = 'user';
}
?>
<!--===== Navbar =======-->
    <nav class="nav">
        <picture >
            <img class="logo" src="public/image/logo_mk.png" alt="logo"/>
        </picture>
        <ul class="sec">
            <li><a href="index.php?action=accueil" class="item">Accueil</a></li>
            <li class="item">Services <i class="fas fa-caret-down"></i></a>
               <!-- Menu déroulant -->
     
            <div class="dropdown-menu">
                    <ul>
                        <li ><a href="index.php?action=listServicesParCat" class="item1">Nettoyage <i class="fas fa-caret-right"></i></a>
                            <div class="dropdown-menu1">
                                <ul>
                                    <li><a href="index.php?action=serviceDet&id" class="item1">Nettoyage Industriel</a></li>
                                    <li><a href="index.php?action=service" class="item1">Nettoyage Particulier</a></li>
                                </ul>

                            </div>
                        </li>
                        <li class="item1">Déménagement et Livraison <i class="fas fa-caret-right"></i></a>
                        <div class="dropdown-menu1">
                                <ul>
                                    <li><a href="index.php?action=serviceDet&id=2" class="item1">Déménagement</a></li>
                                    <li><a href="index.php?action=service" class="item1">Livraison</a></li>
                                </ul>

                            </div>
                        </li>
                        <li class="item1">Bricolage <i class="fas fa-caret-right"></i></a>
                            <div class="dropdown-menu1">
                                <ul>
                                    <li><a href="index.php?action=service" class="item1">Peinture</a></li>
                                    <li><a href="index.php?action=service" class="item1">Jardinage</a></li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>

            </li>
            <li><a href="index.php?action=devis" class="item">Devis</a></li>
            <li><a href="index.php?action=listService" class="item">list services</a></li>
            <li><a href="index.php?action=listDev" class="item">liste des devis</a></li>
            <li><a href="index.php?action=listAvis" class="item">liste avis</a></li>
        </ul> 
        <!-- afficher le lien pour se connecter ou s'incrire -->
         <ul class="login">
         <?php
                    if ( isset ($_SESSION["user"])) {     ?>          
                        <a href="index.php?action=logout" class="item">Se déconnecter</a>
                <?php }   else { ?>
                    <li><a href="index.php?action=login" class="item">Se connecter</a></li>
                    <?php if ($role == "admin") { ?> 
                        <li><a href="index.php?action=register" class="item">S'inscrire</a></li> 
                    <?php } ?>

                <?php } ?> 
         </ul>
    </nav>
    <main>
     <div id="contenu">
           <?= $contenu ?>
    </div>
    
    </main>
    <!--===== Footer =======-->
    <footer class="footer">
        <div class="sec">
            <img class="logofooter" src="public/image/logo_mk.png" alt="logo"/>
            <div class="social">
                <h3 class="titlefooter">Accédez à nos services</h3>
                <a href="service netoyage" class="page"> service netoyage</a>
                <a href="service démenagment" class="page">service démenagment</a>
                <a href="service bricolage" class="page">service bricolage</a>   
            </div>
            <div class="link">
                <h3 class="titlefooter">Nos pages</h3>
                <a href="index.php?action=accueil" class="page">Accueil</a>
                <a href="index.php?action=listeServ" class="page">Services</a>
                <a href="index.php?action=devis" class="page">Devis</a>
            </div>
            <div class="contact">
                <h3 class="titlefooter">contacter nous</h3>
                <a href="tel:+33658964485" class="page"><i class="fa-solid fa-phone"></i> +33658964485</a>
                <a href="mailto:contact.mkservices26@gmail.com" class="page"><i class="fa-solid fa-envelope"></i> contact.mkservices26@gmail.com</a>
                <a href="https://maps.app.goo.gl/92zYpyWpZHhMFQQG8" target="_blank" class="page"><i class="fa-solid fa-location-dot"></i> 24 Rue Jean Giraudoux, Strasbourg, France</a>
            </div>
            
        </div>
        <hr class="hr">
        <p class="copyright">&copy;MK services 2024 - Tous droits réservés</p>
        
    </footer>
</body>
</html>