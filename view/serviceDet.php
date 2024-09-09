<?php ob_start(); ?>
<section id="hero-service">    
    <h1 class="devis-hero"><?php echo htmlspecialchars($service['nom_Ser']); ?></h1>
    <!-- <p class="text-hero"><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>-->
</section>

<!-- Service Detail Section -->
<section id="services-industriaux" >
    
        <h1 class="service-title"><?php echo htmlspecialchars($service['nom_Ser']); ?></h1>
       
            <img class="ser-img"  src="public/image/<?php echo htmlspecialchars($service['image'] ?? 'default_service.jpg'); ?>" alt="Image of <?php echo htmlspecialchars($service['nom_Ser']); ?>">
        
        <p class="description-ser">
        <?php  
            $p = $service['description'];
            $motGras = "MKservices";
            $pMd = str_replace($motGras, "<strong>$motGras</strong>", $p);
            echo $pMd;
        ?></p>
        
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";