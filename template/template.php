<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <link rel = "stylesheet" href = "public/css/style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>PFE</title>
       
</head>

<body>

<?php
use Controlleur\Controller;
$ctrFrm = new Controller();
$cate = $ctrFrm-> listServicesParCat(); //  utiluser la fonction pour afficher les données de tableau categorie  de la base de données 
//var_dump($cate);
//die();
if (isset($_SESSION['user']['role'])) // si l'utilisateur est connecté
{
    $role = $_SESSION['user']['role']; //session prend valeur du role
} else {
    $role = 'user'; // sinon le role est 'user'
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
                    <?php foreach ($cate as $cat): ?>
                        <li ><a class="item1"><?php echo $cat['nom_Cat']; ?><i class="fas fa-caret-right"></i></a>
                            <div class="dropdown-menu1">
                                <ul>
                                    <!--===== $cat['services'] =======-->
                                    <?php  // boucle pour afficher les services
                                    foreach ($cat['services'] as $ser): ?> 
                                    <li><a href="index.php?action=serviceDet&id= <?php echo $ser['id_Services'] ; ?>" class="item1"><?php echo $ser['nom_Ser'] ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                    
                            </div>
                        </li>
                        <?php endforeach; ?>
                        
                    </ul>
                </div>

            </li>
            <li><a href="index.php?action=devis" class="item">Devis</a></li>
            <li><a href="index.php?action=contact" class="item">Contact</a></li>
           <?php if($role == 'admin')   // si l'utilisateur est admin on affiche les liens
           {?>
           <a href="index.php?action=listAvis" class="item"> liste des Avis</a>
           <a href="index.php?action=listService" class="item">liste des services</a>
           <a href="index.php?action=listDev" class="item">liste des devis</a>
           <a href="index.php?action=listDemandeDevis" class="item">liste des demandes de devis</a>
                 <?php } ?>
            
        </ul> 
        <!-- afficher le lien pour se connecter ou s'incrire -->
         <ul class="login">
         <?php
                    if ( isset ($_SESSION["user"])) {     ?>          
                        <a href="index.php?action=logout" class="item">Se déconnecter</a>
                <?php }   else { ?>
                    <li><a href="index.php?action=login" class="item">Se connecter</a></li>
                    <li><a href="index.php?action=register" class="item">S'inscrire</a></li> 
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