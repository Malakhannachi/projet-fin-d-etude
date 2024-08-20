<?php ob_start(); ?> 
<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero"> Connexion </h1>
    
</section>

 <section id="devis" class="devis-background1">
     
    <div class="form devis-background2" >
    <h2 class="title-devis1">Se Connecter</h2>
            <form action="index.php?action=login" method="post" class="formulaire">
                <div class="form-group " >
                    <div class="nom">
        <label for="email" class="label-login">Email</label>
        <input type="email" name="email" id="email" placeholder="email"class="input-login"><br>

        <label for="password" class="label-login">Mot de passe</label>
        <input type="password" name="mdp" id="password" placeholder="password" class="input-login"><br>

        <a href="index.php?action=accueil" ><button class="btn">Se connecter <span>&#x2197;</span></button></a>

    </div>
   </form>
   </section> 

<?php
$contenu = ob_get_clean();
require "template/template.php";


