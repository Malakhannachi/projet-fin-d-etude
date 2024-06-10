<?php ob_start(); ?>
<section id="accueil">
    <div id="contenu">
        <picture>
            <img src="public/image/images.jpg" alt="image d'accueil"/>
        </picture>
        <p class="lead">
            <strong>Nous sommes là pour vous faciliter la vie !</strong>
        </p>
        <p class="par">
        Des services de qualité pour votre maison et votre entreprise : nettoyage, bricolage, installations électriques et vidéosurveillance .
        </p>
    </div>
<section>

<section id="services">
    <div id="milieu">
        <picture>
            <img src="public/image/image2.jpg" alt="image de démanegement"/>
            <p>
            Déménagez en toute sérénité avec notre service rapide, sécurisé et professionnel
            
            <a href="services.php" ><button>Voir plus</button></a>
            </p>
        </picture>
    </div>
    <div>
        <picture>
            <img src="public/image/imag3.webp" alt="image de démanegement"/>
            <p>
            Profitez d'un intérieur impeccable grâce à notre service de nettoyage professionnel, fiable et minutieux
            
            <a href="services.php" ><button>Voir plus</button></a>
            </p>
        </picture>
    </div>
</section>

<section id="devis">
    <h2>Pourquoi choisir MK service ?</h2>
    
    <di id="serinite">
        <picture>
            <img src="public/image/cadna.webp" alt="image de démanegement"/>
        </picture>
        <h4>SÉRÉNITÉ</h4>
        <p>
        Sans engagement, aucun frais d’annulation
        </p>
    </div>
    <div id="transparance">
        <picture>
            <img src="public/image/T.webp" alt="image de démanegement"/>
        </picture>
        <h4>TRANSPARENCE</h4>
        <p>
        Le prix ? Le temps passé à vous satisfaire est notre mesure et rien d’autre !
        </p>
    </div>
    <div id="flexibilite">
        <picture>
            <img src="public/image/cal.webp" alt="image de démanegement"/>
        </picture>
        <h4>FLEXIBILITÉ</h4>
        <p>
        Un intervenant qui s’adapte à votre planning et votre nouveau mode de vie
        </p>
    </div>
    <div id="privilege">
        <picture>
            <img src="public/image/pri.webp" alt="image de démanegement"/>
        </picture>
        <h4>FLEXIBILITÉ</h4>
        <p>
        Un intervenant qui s’adapte à votre planning et votre nouveau mode de vie
        </p>
    </div>
    <div id="button">
        <a href="devis.php" ><button>Je demande un devis</button></a>
        <p>C’est gratuit et sans engagement !</p>
    </div>
</section>

<section id="avis">
    <h3>Avis Nos Clients </h3>
    <p id="pO">
    ServicePro a fait un travail incroyable chez moi. Le personnel est arrivé à l'heure, équipé de tout le matériel nécessaire. Ils ont nettoyé chaque recoin de la maison avec une attention particulière aux détails. Le résultat final était impeccable
    </p>
    <p id="pT">
    ServicePro s'occupe de l'entretien de mon jardin depuis six mois maintenant et je suis extrêmement satisfait. Mon jardin n'a jamais été aussi beau ! Ils sont ponctuels
    </p>
    <a href="avis.php" ><button>Voir tout les avis </button"></a>

</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";