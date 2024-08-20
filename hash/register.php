<?php ob_start(); ?> 
<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Inscription </h1>
    
</section>

 <section id="devis" class="devis-background1">
     
    <div class="form devis-background2" >
    <h2 class="title-devis1">Inscription</h2>

            <form action="index.php?action=register" method="post" class="formulaire">
                <div class="form-group " >
                <div class="nom">
                        <label for="nom" class="label-devis">Nom</label>
                        <input type="text" name="nom" id="nom" class="input" placeholder="nom">
                        
                    </div>
                    <div class="nom">
                        <label for="prenom" class="label-devis">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom">
                        
                    </div>
                </div>
                <div class="list">
                    <label for="email" class="label-login">Email</label>
                    <input type="email" name="email" id="email" placeholder="email"class="input-login"><br>
                </div>
                <div class="list">
                    <label for="password" class="label-login">Mot de passe</label>
                    <input type="password" name="mdp" id="password" placeholder="password" class="input-login"><br>
                </div>

                <div class="list">

                    <label for="mdp" class="label-login">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" class="input-login"><br>
                </div>
                <div class="list">
                    <label for="mdp2"class="label-login"> Confirmation de mot de passe</label>
                    <input type="password" name="mdp2" id="mdp2" class="input-login"><br>
                </div>

                    <button type="submit" class="btn">S'inscrire</button>
                </div>

            </form>
   </div>
</section>


<?php
$contenu = ob_get_clean();
require "template/template.php";