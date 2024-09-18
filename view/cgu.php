<?php ob_start(); ?>


   <section class="hero-cgu">
       <h2 class="cgu-title">Conditions Générales d'Utilisation</h2>
   </section>
   <section class="cgu">
    <h2 class="resume">Résumé de nos conditions</h2>
        <h2 class="cgu-cgu">1. Introduction</h2>
        <p class="cgu-text">Bienvenue sur notre site web. En utilisant ce site, vous acceptez les présentes Conditions Générales d'Utilisation (CGU). Si vous n'acceptez pas ces termes, vous ne devez pas utiliser notre site.</p>
    
    
        <h2 class="cgu-cgu">2. Accès au site</h2>
        <p class="cgu-text">Le site est accessible gratuitement à tout utilisateur disposant d'un accès à Internet. L'ensemble des coûts liés à l'accès au site, que ce soit pour le matériel, les logiciels ou l'accès à Internet, sont à la charge de l'utilisateur.</p>
    

        <h2 class="cgu-cgu">3. Propriété intellectuelle</h2>
        <p class="cgu-text">Le contenu de ce site, incluant mais non limité aux textes, images, logos, et tout autre élément, est protégé par des droits de propriété intellectuelle. Toute reproduction ou utilisation non autorisée est interdite.</p>
    

    
        <h2 class="cgu-cgu">4. Utilisation des données</h2>
        <p class="cgu-text">Nous recueillons et utilisons vos données conformément à notre politique de confidentialité. En utilisant ce site, vous acceptez ces pratiques.</p>
    
        <h2 class="cgu-cgu">5. Limitation de responsabilité</h2>
        <p class="cgu-text">Nous nous efforçons de maintenir à jour les informations présentes sur notre site, mais nous ne pouvons garantir leur exactitude en tout temps. Nous déclinons toute responsabilité en cas de dommages résultant de l'utilisation des informations disponibles sur le site.</p>

        <h2 class="cgu-cgu">6. Modifications des CGU</h2>
        <p class="cgu-text">Nous nous réservons le droit de modifier ces CGU à tout moment. Les modifications seront publiées sur cette page et entreront en vigueur immédiatement après leur publication.</p>
        
     </section>

    <?php
$contenu = ob_get_clean();
require "template/template.php";
