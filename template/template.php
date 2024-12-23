<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MK services</title>
    <!-- tarte au citron script -->
    <script src="/projet fin d'etude/tarteaucitron/tarteaucitron.js"></script>
    <script type="text/javascript">

        tarteaucitron.init({
            "privacyUrl": "",
            /* Privacy policy url */
            "bodyPosition": "bottom",
            /* or top to bring it as first element for accessibility */

            "hashtag": "#tarteaucitron",
            /* Open the panel with this hashtag */
            "cookieName": "tarteaucitron",
            /* Cookie name */

            "orientation": "middle",
            /* Banner position (top - bottom) */

            "groupServices": false,
            /* Group services by category */
            "showDetailsOnClick": true,
            /* Click to expand the description */
            "serviceDefaultState": "wait",
            /* Default state (true - wait - false) */

            "showAlertSmall": false,
            /* Show the small banner on bottom right */
            "cookieslist": false,
            /* Show the cookie list */

            "closePopup": false,
            /* Show a close X on the banner */

            "showIcon": true,
            /* Show cookie icon to manage cookies */
            //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
            "iconPosition": "BottomRight",
            /* BottomRight, BottomLeft, TopRight and TopLeft */

            "adblocker": false,
            /* Show a Warning if an adblocker is detected */

            "DenyAllCta": true,
            /* Show the deny all button */
            "AcceptAllCta": true,
            /* Show the accept all button when highPrivacy on */
            "highPrivacy": true,
            /* HIGHLY RECOMMANDED Disable auto consent */
            "alwaysNeedConsent": false,
            /* Ask the consent for "Privacy by design" services */

            "handleBrowserDNTRequest": false,
            /* If Do Not Track == 1, disallow all */

            "removeCredit": false,
            /* Remove credit link */
            "moreInfoLink": true,
            /* Show more info link */

            "useExternalCss": false,
            /* If false, the tarteaucitron.css file will be loaded */
            "useExternalJs": false,
            /* If false, the tarteaucitron.js file will be loaded */

            //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

            "readmoreLink": "",
            /* Change the default readmore link */

            "mandatory": true,
            /* Show a message about mandatory cookies */
            "mandatoryCta": true,
            /* Show the disabled accept button when mandatory on */

            //"customCloserId": "", /* Optional a11y: Custom element ID used to open the panel */

            "googleConsentMode": true,
            /* Enable Google Consent Mode v2 for Google ads and GA4 */

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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GTM-KGM3BCFW')
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Services de déménagement, livraison, nettoyage et bricolage sur mesure. Fiabilité, rapidité et qualité pour particuliers et entreprises. Satisfaction garantie !">
    <meta name="keywords" content="demenagement, livraison rapide,livraison industriel, nettoyage industriel,nettoyage professionnel, bricolage">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" type="image/x-icon" href="public/image/logo-mk.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-KGM3BCFW"
            height="0"
            width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
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
        $role = 'visiteur';
    }
    ?>
    <!--===== Navbar =======-->
    <nav class="nav">
        <picture>
            <a href="index.php?action=accueil"><img class="logo" src="public/image/logo mk.png" alt="logo mk services" /></a>
        </picture>

        <ul class="sec">
            <li><a href="index.php?action=accueil" class="item">Accueil</a></li>
            <?php if ($role == 'admin') { ?> <!-- si l'utilisateur est admin on affiche les liens -->
                <li><a href="index.php?action=listAvis" class="item"> liste des Avis</a></li>
                <li><a href="index.php?action=listService" class="item">liste des Services</a></li>
                <li><a href="index.php?action=listDev" class="item">liste des Devis</a></li>
                <li><a href="index.php?action=listDemandeDevis" class="item">liste Demandes Devis</a></li>
            <?php } else { ?>
                <!-- si c'est un utilisateur ou admin connecté on affiche le liste -->
                <?php if ($role == 'user') { ?>
                    <li><a href="index.php?action=listDemandeDevis" class="item">liste Demandes Devis</a></li>
                <?php } ?>
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
                <li><a class="item2" href="index.php?action=profil&id=<?php echo $_SESSION["user"]["id_User"]; ?>"&nbsp;&nbsp; class="item">&nbsp;&nbsp;<i class="fas fa-user">&nbsp;&nbsp;</i> <?php echo $_SESSION["user"]["pseudo"]; ?></a></li>
                <li><a href="index.php?action=logout" class="item2">Se déconnecter</a></li>

            <?php } else { ?>
                <li><a href="index.php?action=login" class="item2">Se connecter</a></li>
                <li><a href="index.php?action=register" class="item2">S'inscrire</a></li>
            <?php } ?>


        </ul>
    </nav>

    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Top Navigation Menu -->
    <div class="topnav">
        <a style="display: flex; align-items: center; gap: 5px" href="index.php?action=accueil" class="active"><img src="public/image/logo-mk.ico" alt="mk services" style="width: 18px;" /> <span>mk services</span></a>
        <ul id="myLinks">
            <a href="index.php?action=accueil">Accueil</a>
                <?php if ($role == 'admin') { ?> <!-- si l'utilisateur est admin on affiche les liens -->
                    <li><a href="index.php?action=listAvis" class="responsive"> liste des Avis</a></li>
                    <li><a href="index.php?action=listService" class="responsive">liste des Services</a></li>
                    <li><a href="index.php?action=listDev" class="responsive">liste des Devis</a></li>
                    <li><a href="index.php?action=listDemandeDevis" class="responsive">liste.Demandes.Devis</a></li>
                <?php } else if ($role == 'user') { ?>
                    <li><a href="index.php?action=listDemandeDevis" class="responsive">liste Demandes Devis</a></li>
                <?php } else { ?>
                    <li><a href="index.php?action=devis" class="item">Devis</a></li>
                    <li><a href="index.php?action=avis" class="item">Avis</a></li>
                    <li><a href="index.php?action=contact" class="item">Contact</a></li>
                <?php } ?>
                <li><a class="item">Services <i class="fas fa-caret-down"></i></a>
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
                <?php
                if (isset($_SESSION["user"])) {     ?>
                    <li><a class="item" href="index.php?action=profil&id=<?php echo $_SESSION["user"]["id_User"]; ?>" class="item"><i class="fas fa-user"></i> <?php echo $_SESSION["user"]["pseudo"]; ?></a></li>
                    <li><a href="index.php?action=logout" class="item">Se déconnecter</a></li>

                <?php } else { ?>
                    <li><a href="index.php?action=login" class="item">Se connecter</a></li>
                    <li><a href="index.php?action=register" class="item">S'inscrire</a></li>
                <?php } ?>
            </ul>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    
    <main>
        <div id="contenu">
            <?= $contenu ?>
        </div>

    </main>
    <!--===== Footer =======-->
    <footer class="footer">
        <div class="sec">
            <div class="logF">
                <img class="logofooter" src="public/image/logo mk.png" alt="logo" />
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
    <button id="scrollToTopBtn"><i class="fas fa-arrow-up"></i></button>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="public/js/script.js"></script>
<script>
    $(document).ready(function(){
        $('.portfolio').slick({
            slidesToShow: 3,           // Show one slide at a time for responsiveness
            slidesToScroll: 1,
            autoplay: true,            // Enable autoplay
            autoplaySpeed: 2000,       // Set the autoplay speed (milliseconds)
            dots: true,                // Add navigation dots
            arrows: false,             // Hide arrows for a cleaner look
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
        $('.hero-carousel').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: false,
            fade: true,   // Optional: Adds a fade transition effect
            cssEase: 'linear',
            adaptiveHeight: false,
        });
    });

    // Show button when scrolled down 100px from the top
    window.onscroll = function () {
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.style.display = "flex";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    // Scroll smoothly to the top when button clicked
    document.getElementById("scrollToTopBtn").addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

</script>


</html>