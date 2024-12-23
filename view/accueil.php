<?php 
ob_start();
$errors = $_SESSION["errors"] ?? []; // afficher les erreurs  

?>

<!-- hero section -->
<div class="hero-carousel">
    <section id="hero">
        <img src="public/image/slider-1.jpg" alt="Slider Image 1" class="hero-image">
        <div class="overlay"></div>
        <div class="contenu"> 
            <p class="lead"><strong>Nous sommes là pour vous faciliter la vie !</strong></p>
            <p class="par">Des services de qualité pour votre maison et votre entreprise : Livraison, Déménagement, Nettoyage et Bricolage !</p>
            <a href="index.php?action=devis"><button class="btn">Devis Express <span>&#x2197;</span></button></a>
        </div>    
    </section>
    
    <section id="hero2">
        <img src="public/image/demser.jpeg" alt="Slider Image 2" class="hero-image">
        <div class="overlay"></div>
        <div class="contenu"> 
            <p class="lead"><strong>Nous sommes là pour vous faciliter la vie !</strong></p>
            <p class="par">Des services de qualité pour votre maison et votre entreprise : Livraison, Déménagement, Nettoyage et Bricolage !</p>
            <a href="index.php?action=devis"><button class="btn">Devis Express <span>&#x2197;</span></button></a>
        </div>    
    </section>
</div>


<!--===== Section services =======-->

<section id="services">
    <div class="par-sec">
        <h2 class="title">Nos services</h2>
        <p class="description">
            Chez <strong>MK services</strong>, nous offrons des services de nettoyage, déménagement et bricolage pour simplifier votre vie avec des solutions fiables et personnalisées
        </p>
    </div>
    
    <div class="bloc">
        <?php foreach($services as $service):?>

            <div class="card">
                    <img class="card-img" src="public/image/<?php echo htmlspecialchars($service['image'] );?>" alt=<?php echo htmlspecialchars($service['nom_Ser'] );?>/>
                <div class="card-content">
                    <h4 class="card-title"><?php echo htmlspecialchars($service['nom_Ser']  );?></h4>
                    <p class="card-text">
                    <?php 
                    if
                        (strlen($service['description']) > 100)
                        echo substr (htmlspecialchars($service['description']), 0, 100)."...";   // substr afficher seulement les 60 premiers caractères avec le ...
                        else
                        echo htmlspecialchars($service['description']);
                        ?>
                    </p>
                    <a href="index.php?action=serviceDet&id=<?php echo htmlspecialchars($service['id_Services'] );?>" ><button class="card-btn">Voir plus</button></a> 
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
            <img class="avis-img" src="public/image/<?php echo htmlspecialchars($av['image'] );?>" alt="<?php echo htmlspecialchars($av['pseudo']);?>"/>
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
                <p class="avis-name"><strong><?php echo htmlspecialchars($av['pseudo'] );?></strong></p>     
        </div>
        <?php endforeach; ?>
    </div >
    <a href="index.php?action=avis" ><button class="btn-avis">Voir plus <span>&#x2197;</span></button></a>
  

</section> 

<!--===== Section nous choisir =======-->
<section id="features-section">
    <h2 class="title-features">Nous choisir</h2>
    <div class="features-section">
        <div class="feature-block">
            <img src="public/image/N-picto-satisfaction.svg" alt="Icon 1">
            <p>Des intervenants en CDI, formés et qualifiés</p>
        </div>
        <div class="feature-block">
            <img src="public/image/N-picto-gestion-administrative.svg" alt="Icon 2">
            <p>Nous répondons rapidement à vos besoins, pour vous offrir un service efficace et sans délai</p>
        </div>
        <div class="feature-block">
            <img src="public/image/N-picto-pouce.svg" alt="Icon 3">
            <p>Garantie “satisfait, refait ou remboursé”</p>
        </div>
        <!-- <div class="feature-block">
            <img src="public/image/N-picto-reseau.svg" alt="Icon 4">
            <p>50% de crédit d’impôt ou avance immédiate</p>
        </div> -->
        <div class="feature-block">
            <img src="public/image/picto-credit-impot.svg" alt="Icon 5">
            <p>Des tarifs compétitifs pour un service à la hauteur de vos attentes</p>
        </div>
    </div>
</section>
<!--===== Section Devis =======-->
<section id="devis" class="devis-background">
    <div class="devis-content">
    <h2 class="title-devis">Illuminez votre message - Contactez-nous</h2>
    <p class="text-devis">Vous avez des questions ou êtes prêt à commencer avec nos services ? Notre équipe est là pour vous aider !</p>
    </div>
    
    <div class="form">
    <h2 class="title-devis">Demander un devis</h2>
        <form action="index.php?action=addDevAcceuil" method="post" class="formulaire">
        <div class="form-group">
            <div class="nom">
                <label for="nom" class="label-devis">Nom</label>
                <input type="text" name="nom" id="nom" class="input" placeholder="Nom" value="<?php echo htmlspecialchars($nom ?? ''); ?>">
                <?php if (!empty($errors['nom'])): ?>
                    <div class="error"><?php echo $errors['nom']; ?></div>
                <?php endif; ?>
            </div>
            <div class="nom">
                <label for="prenom" class="label-devis">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="input" placeholder="Prénom" value="<?php echo htmlspecialchars($prenom ?? ''); ?>">
                <?php if (!empty($errors['prenom'])): ?>
                    <div class="error"><?php echo $errors['prenom']; ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="list">
            <label for="tel" class="label-devis">Numéro de téléphone</label>
            <input type="tel" name="tel" id="tel" class="input" placeholder="06 00 00 00 00" value="<?php echo htmlspecialchars($tel ?? ''); ?>">
            <?php if (!empty($errors['tel'])): ?>
                <div class="error"><?php echo $errors['tel']; ?></div>
            <?php endif; ?>
        </div>
        <div class="list">
            <label for="email" class="label-devis">Email</label>
            <input type="email" name="email" id="email" class="input" placeholder="Email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
            <?php if (!empty($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
                <div class="list">
                    <label for="adresse"  class="label-devis">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="input" placeholder="adresse">
                </div>
                <div class="form-group " >
                    <div class="nom">
                        <label for="ville" class="label-devis">Ville</label>
                        <input type="text" name="ville" id="ville" class="input" placeholder="ville">
                        <?php if (!empty($_SESSION["errors"]['ville'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['ville']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="nom">
                        <label for="codePostal" class="label-devis">Code Postal</label>
                        <input type="number" name="codePostal" id="codePostal" class="input" placeholder="code postal">
                        <?php if (!empty($_SESSION["errors"]['codePostal'])): ?>
                            <div class="error"><?php echo $_SESSION["errors"]['codePostal']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
        <div class="list">
                    <label for="id_services" class="label-devis">sélectionnez un service</label>
                    <select name=" liste_Service" id="id_services" class="input">
                        <option value="">sélectionnez un service</option>
                            <?php foreach($serDev as $service): ?>
                        <option value="<?php echo $service['id_Services'] ?>"><?php echo $service['nom_Ser'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
        <div class="list">
            <label for="besoin" class="label-devis">Votre besoin</label>
            <textarea name="besoin" id="besoin" rows="5" placeholder="Votre besoin"><?php echo htmlspecialchars($besoin ?? ''); ?></textarea>
            <?php if (!empty($errors['besoin'])): ?>
                <div class="error"><?php echo $errors['besoin']; ?></div>
            <?php endif; ?>
        </div>
        <div class="list">
            <button class="btn-avis" type="submit" name="submit">Envoyer <span>&#x2197;</span></button>
        </div>
    </form>
        </div>

</section>
<!--===== Section portfolio =======-->

<section id="portfolio-section">
     <h2 class="title-portfolio">Réalisations qui ont satisfait nos clients</h2>
    
            <div class="portfolio">
                <img class="img-por" src="public/image/1.png" alt="entreprise intercarrat">
                <img src="public/image/2.png" alt="entreprise voltac">
                <img class="img-por" src="public/image/3.png" alt="entreprise intercarrat">
                <img src="public/image/4.png" alt="entreprise voltac">
            </div>

</section>

<?php
// session_unset();
unset($_SESSION["errors"]);
$contenu = ob_get_clean();
require "template/template.php";