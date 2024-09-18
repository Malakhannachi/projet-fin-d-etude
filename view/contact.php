<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    
        <h1 class="devis-hero">Contactez-nous dès aujourd'hui</h1>
        <p class="text-hero">Contactez-nous pour un service personnalisé et une réponse rapide à vos besoins</p>
    
</section>

<section id="contact">
    <div class="contact-footer">
                <h3 class="titlefooter">Contacter nous</h3>
                <a href="tel:+33658964485" class="icon"> <i class="fa-solid fa-phone"></i>  +33658964485</a>
                <a href="mailto:contact.mkservices26@gmail.com" class="icon"> <i class="fa-solid fa-envelope"></i>  contact.mkservices26@gmail.com</a>
                <a href="https://maps.app.goo.gl/92zYpyWpZHhMFQQG8" target="_blank" class="icon"> <i class="fa-solid fa-location-dot"></i>  24 Rue Jean Giraudoux, Strasbourg, France</a>
    
    </div>
    
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2639.2258442260445!2d7.698608110493328!3d48.58637441969304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4796b7d236a00fb7%3A0x5afaaa6d8dafbc82!2s24%20Rue%20Jean%20Giraudoux%2C%2067200%20Strasbourg%2C%20France!5e0!3m2!1sfr!2stn!4v1723375626554!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    


   

</section>


               
                        

<?php
$contenu = ob_get_clean();
require "template/template.php";