<?php ob_start(); ?>
<section id="hero-devis">    
    <h1 class="devis-hero"><?php echo htmlspecialchars($service['nom_Ser']); ?></h1>
    <p class="text-hero"><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>
</section>

<!-- Service Detail Section -->
<section id="services-industriaux" style="height: 600px;">
    
        <h1 class="service-title"><?php echo htmlspecialchars($service['nom_Ser']); ?></h1>
        <img  src="public/image/<?php echo htmlspecialchars($service['image'] ?? 'default_service.jpg'); ?>" alt="Image of <?php echo htmlspecialchars($service['nom_Ser']); ?>" style="width: 100%; height: auto;">
        <p><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>
        
</section>

<?php
$contenu = ob_get_clean();
require "template/template.php";