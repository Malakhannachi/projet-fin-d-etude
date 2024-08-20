<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Avis de Nos Clients</h1>
        <p class="text-hero">Votre satisfaction est notre priorité. Partagez votre avis !</p>
        <a href="index.php?action=pageAvis" ><button class="btn">Ajouter un avis <span>&#x2197;</span></button></a>
</section>
<section id="avis">
    <div class="bloc-avis ">
    <?php foreach($avis as $av):?> <!--boucle pour afficher les avis -->
        <div class="card-avis">
            <img class="avis-img" src="public/image/<?php echo htmlspecialchars($av['image'] );?>" alt="<?php echo htmlspecialchars($av['nom'].' '.$av['prenom']);?>"/>
            
                <p class="text-avis">
                    <?php echo htmlspecialchars($av['commentaire'] );?>
                </p> 
                <div class="stars">
                    <?php $stars = $av['note'];
                    for ($i=0; $i < $stars ; $i++) { //boucle pour afficher les étoiles
        
                        echo "<span class='stars'>&#9733;</span>"; /*&#9733; pour laisser un étoile vide pour l'instant */
                    }
                    for ($i=0; $i < 5-$stars ; $i++) {
                        
                            echo "<span class='stars'>&#9734;</span>"; /*&#9734; pour laisser un étoile vide pour l'instant */
                            
                    } 
                    ?>
                </div>
                <p class="avis-name"><strong><?php echo htmlspecialchars($av['nom'].' '.$av['prenom']);?></strong></p>
   
        </div>
        <?php endforeach; ?>     
    </div>
     <!-- Pagination -->
     <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?action=avis&page=<?php echo $page - 1; ?>" class="pagination-link">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?action=avis&page=<?php echo $i; ?>" class="pagination-link <?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?action=avis&page=<?php echo $page + 1; ?>" class="pagination-link">&raquo;</a>
        <?php endif; ?>
    </div>
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";

