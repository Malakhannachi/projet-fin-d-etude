<?php ob_start(); ?>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: Arial, Helvetica, sans-serif;  
    width: 100%;
    height: 100vh;
   
    
    
}
    #hero{
    width: 100%;
    height: 100vh;
    flex-direction: row;
    display: flex;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(public/image/clean2.jpeg) ;
    background-repeat: no-repeat; /*n'est pas repeate*/
    background-size: cover; /*la largeur et la hauteur sont respectivement 100% de la largeur et de la hauteur de l'image*/
    

}
.imgHero{
    width: 100%;
    height: 100%;
    
}
.contenu{
    width: 40%;
    height: 100%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items:flex-start;
       
}
.lead{
    font-size: 20px;
    color: white;
    padding-bottom: 15px;
}
.par{
    font-size: 16px;
    color: white;
   
}
.btn{
    margin-top: 20px;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #FFD028;
    color: white;
}
</style>

<section id="hero">    <!-- hero section -->
    
    <div class="contenu">  
        <p class="lead">
            <strong>Nous sommes là pour vous faciliter la vie !</strong>
        </p>
        <p class="par">
        Des services de qualité pour votre maison et votre entreprise : nettoyage, bricolage, installations électriques et vidéosurveillance .
        </p>
        <a href="services.php" ><button class="btn">En savoir plus</button></a>
    </div>
</section>
<section id="hero">    <!-- hero section -->
    
    <div class="contenu">  
        <p class="lead">
            <strong>Nous sommes là pour vous faciliter la vie !</strong>
        </p>
        <p class="par">
        Des services de qualité pour votre maison et votre entreprise : nettoyage, bricolage, installations électriques et vidéosurveillance .
        </p>
        <a href="services.php" ><button class="btn">En savoir plus</button></a>
    </div>
</section>


<!-- <section id="services">
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

</section> -->

<?php
$contenu = ob_get_clean();
require "template/template.php";