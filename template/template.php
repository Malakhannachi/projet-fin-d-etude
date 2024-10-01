<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MK services</title>
    <!-- tarte au citron script -->
    <script src="/projet fin d'etude/tarteaucitron/tarteaucitron.js"></script>
        <script type="text/javascript">

            // console.log(tarteaucitron);
            
        tarteaucitron.init({
    	  "privacyUrl": "", /* Privacy policy url */
          "bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

    	  "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    	  "cookieName": "tarteaucitron", /* Cookie name */
    
    	  "orientation": "middle", /* Banner position (top - bottom) */
       
          "groupServices": false, /* Group services by category */
          "showDetailsOnClick": true, /* Click to expand the description */
          "serviceDefaultState": "wait", /* Default state (true - wait - false) */
                           
    	  "showAlertSmall": false, /* Show the small banner on bottom right */
    	  "cookieslist": false, /* Show the cookie list */
                           
          "closePopup": false, /* Show a close X on the banner */

          "showIcon": true, /* Show cookie icon to manage cookies */
          //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
          "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

    	  "adblocker": false, /* Show a Warning if an adblocker is detected */
                           
          "DenyAllCta" : true, /* Show the deny all button */
          "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
          "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */
          "alwaysNeedConsent": false, /* Ask the consent for "Privacy by design" services */
                           
    	  "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    	  "removeCredit": false, /* Remove credit link */
    	  "moreInfoLink": true, /* Show more info link */

          "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
          "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

    	  //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
                          
          "readmoreLink": "", /* Change the default readmore link */

          "mandatory": true, /* Show a message about mandatory cookies */
          "mandatoryCta": true, /* Show the disabled accept button when mandatory on */
    
          //"customCloserId": "", /* Optional a11y: Custom element ID used to open the panel */
          
          "googleConsentMode": true, /* Enable Google Consent Mode v2 for Google ads and GA4 */
          
          "partnersList": false /* Show the number of partners on the popup/middle banner */
        });        
        
        </script>

        
<!-- recaptcha -->
        <script type="text/javascript">
                tarteaucitron.user.recaptchaapi = '6LfXFk8qAAAAAHgFqaeKL--ZYBXHUCMRKFgVhta5';
                (tarteaucitron.job = tarteaucitron.job || []).push('recaptcha');
        </script>

<script async src="https://www.googletagmanager.com/ns.html?id=GTM-KGM3BCFW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GTM-KGM3BCFW')
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Services de déménagement, livraison, nettoyage et bricolage sur mesure. Fiabilité, rapidité et qualité pour particuliers et entreprises. Satisfaction garantie !">
    <meta name="keywords" content="demenagement, livraison rapide,livraison industriel, nettoyage industriel,nettoyage professionnel, bricolage">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
       

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript
      ><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-KGM3BCFW"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
      ></iframe
    ></noscript>
    <!-- End Google Tag Manager (noscript) -->

  
<!-- End Google Tag Manager (noscript) -->

    <?php

    use Controlleur\Controller;

    $ctrFrm = new Controller();
    $cate = $ctrFrm->listServicesParCat(); //  utiluser la fonction pour afficher les données de tableau categorie  de la base de données 
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
        <picture>
            <img class="logo" src="public/image/logo_mk.png" alt="logo" />
        </picture>
    
        <ul class="sec">
            <li><a href="index.php?action=accueil" class="item">Accueil</a></li>
            
            <?php if ($role == 'admin')   // si l'utilisateur est admin on affiche les liens
            { ?>
                <li><a href="index.php?action=listAvis" class="item"> liste des Avis</a></li>
                <li><a href="index.php?action=listService" class="item">liste des services</a></li>
                <li><a href="index.php?action=listDev" class="item">liste des devis</a></li>
                <li><a href="index.php?action=listDemandeDevis" class="item">liste des demandes de devis</a></li>
                

            <?php } else { ?>
                <li class="item">Services <i class="fas fa-caret-down"></i></a>
                <!-- Menu déroulant -->

                <div class="dropdown-menu">
                    <ul>
                        <?php foreach ($cate as $cat): ?>
                            <li class="item1"> <?php echo $cat['nom_Cat']; ?><i class="fas fa-caret-right"></i>
                                <div class="dropdown-menu1">
                                    <ul>
                                        <!--===== $cat['services'] =======-->
                                        <?php  // boucle pour afficher les services
                                        foreach ($cat['services'] as $ser): ?>
                                            <li><a href="index.php?action=serviceDet&id= <?php echo $ser['id_Services']; ?>" class="item1"><?php echo $ser['nom_Ser'] ?></a></li>
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
            <?php } ?>
        </ul>
        <!-- afficher le lien pour se connecter ou s'incrire -->
        <ul class="login">
            <!--===== afficher le nom de l'utilisateur connecté  =======-->
            <?php
            if (isset($_SESSION["user"])) {     ?>
            <li><a class="item2" href="index.php?action=profil&id=<?php echo $_SESSION["user"]["id_User"]; ?>" class="item"><i class="fas fa-user"></i> <?php echo $_SESSION["user"]["pseudo"]; ?></a></li>
            <li><a href="index.php?action=logout" class="item2">Se déconnecter</a></li>
                
            <?php } else { ?>
                <li><a href="index.php?action=login" class="item2">Se connecter</a></li>
                <li><a href="index.php?action=register" class="item2">S'inscrire</a></li>
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
            <div class="logF">
                <img class="logofooter" src="public/image/logo_mk.png" alt="logo" />
            </div>
            <div class="social">
                <h3 class="titlefooter1">Accédez à nos services</h3>
                <a href="service netoyage" class="page"> Service de livraison</a>
                <a href="service démenagment" class="page">Service démenagment</a>
                <a href="service bricolage" class="page">Service bricolage</a>
            </div>
            <div class="link">
                <h3 class="titlefooter1">Nos pages</h3>
                <a href="index.php?action=accueil" class="page">Accueil</a>
                <a href="index.php?action=listeServ" class="page">Services</a>
                <a href="index.php?action=devis" class="page">Devis</a>
            </div>
            <div class="contact">
                <h3 class="titlefooter1">Contacter nous</h3>
                <a href="tel:+33658964485" class="page"><i class="fa-solid fa-phone"></i> +33658964485</a>
                <a href="mailto:contact.mkservices26@gmail.com" class="page"><i class="fa-solid fa-envelope"></i> contact.mkservices26@gmail.com</a>
                <a href="https://maps.app.goo.gl/92zYpyWpZHhMFQQG8" target="_blank" class="page"><i class="fa-solid fa-location-dot"></i> 24 Rue Jean Giraudoux, Strasbourg, France</a>
            </div>

        </div>
        <hr class="hr">
        <div class="copyright">
            <span class="cgu-footer">&copy;MK services 2024 - Tous droits réservés</span><a class="cgu-footer" href="index.php?action=cgu">Conditions Générales d'Utilisation</a> <a class="cgu-footer" href="index.php?action=cgv">Conditions Génrales de Vente</a>
        </div>

    </footer>
    

        
</body>

</html>