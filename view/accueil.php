<?php ob_start(); ?>

<!-- hero section -->
<section id="hero">    
    
    <div class="contenu"> 
         
        <p class="lead">
            <strong>Nous sommes là pour vous faciliter la vie !</strong>
        </p>
        <p class="par">
        Des services de qualité pour votre maison et votre entreprise : nettoyage, bricolage, installations électriques et vidéosurveillance
        </p>
        <a href="index.php?action=devis" ><button class="btn">Devis Express <span>&#x2197;</span></button></a>
    </div>
</section>

<!--===== Section services =======-->

<section id="services">
    <h2 class="title">Nos services</h2>
    <p class="description">
        Chez <strong>MK service</strong>, nous offrons des services de nettoyage, déménagement et bricolage pour simplifier votre vie avec des solutions fiables et personnalisées
    </p>
    
    <div class="bloc">
        <?php foreach($services as $service):?>

            <div class="card">
                    <img class="card-img" src="public/image/<?php echo htmlspecialchars($service['image'] );?>" alt=<?php echo htmlspecialchars($service['nom_Ser'] );?>/>
                <div class="card-content">
                    <h4 class="card-title"><?php echo htmlspecialchars($service['nom_Ser']  );?></h4>
                    <p class="card-text">
                    <?php echo htmlspecialchars($service['description'] );?>
                    </p>
                    <a href="services.php" ><button class="btn">Voir plus</button></a> 
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section> 

<!--===== Section Avis =======-->

<section id="avis">
    <h2 class="title-avis">Votre satisfaction est notre priorité. Partagez votre avis !</h2>
    <div class="bloc ">
        <?php foreach($avis as $av):?>
        <div class="card-avis">
            <img class="avis-img" src="public/image/<?php echo htmlspecialchars($av['image'] );?>" alt="<?php echo htmlspecialchars($av['nom'].' '.$av['prenom']);?>"/>
                <p class="text-avis">
                    <?php echo htmlspecialchars($av['commentaire'] );?>
                 </p> 
                <div class="stars">
                    <!--afficher les étoils -->
                    <?php $stars = $av['note'];
                    for ($i=0; $i < $stars ; $i++) {
        
                        echo "<span class='stars'>&#9733;</span>"; /*&#9733; pour laisser un étoile vide pour l'instant */
                    }
                    for ($i=0; $i < 5-$stars ; $i++) {
                        
                            echo "<span class='stars'>&#9734;</span>"; /*&#9734; pour laisser un étoile vide pour l'instant */
                            
                    } 
                    ?>
                </div>
                <p class="avis-name"><strong><?php echo htmlspecialchars($av['nom'].' '.$av['prenom'] );?></strong></p>     
        </div>
        <?php endforeach; ?>
    </div >
    <a href="index.php?action=avis" ><button class="btn-avis">Voir plus <span>&#x2197;</span></button></a>
  
    <!--===== Section Devis =======-->


</section> 
 <section id="devis" class="devis-background">
    <div class="devis-content">
    <h2 class="title-devis">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div>
    
    <div class="form">
    <h2 class="title-devis">Demander un devis</h2>
            <form action="index.php?action=devis" method="post" class="formulaire">
                <div class="form-group">
                    <div class="nom">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="input" placeholder="nom">
                    </div>
                    <div class="nom">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="input" placeholder="prenom">
                    </div>
                </div>
                <div class="list">
                    <label for="telephone" >Numéro de téléphone</label>
                    <input type="tel" name="tel" id="telephone" class="input" placeholder="06 00 00 00 00">
                </div>
                <div class="list">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input" placeholder="email">
                </div>
                <div class="list">
                    <label for="id_services">sélectionnez un service</label>
                    <select name="" id="id_services" class="input">
                        <option value="">sélectionnez un service</option>
                        <option value="1">Service 1</option>
                        <option value="2">Service 2</option>
                        <option value="3">Service 3</option>
                        <option value="4">Service 4</option>
                        <option value="5">Service 5</option>

                    </select>
                </div>
                <div class="list">
                    <label for="besoin" >Votre besoin</label>
                    <textarea name="besoin" id="bsoin" rows="5" placeholder="Votre besoin" > </textarea>
                </div>
                <div class="list">
                    <button class="btn-avis" type="submit">Envoyer <span>&#x2197;</span></button>
                </div>
            </form>
        </div>

</section>
       
<?php
$contenu = ob_get_clean();
require "template/template.php";