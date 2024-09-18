<?php ob_start(); ?>


   <section class="hero-cgu">
       <h2 class="cgu-title">Conditions Générales de Vente</h2>
   </section>
   <section class="cgu">
    <h2 class="resume">Conditions Générales de Vente (CGV) - MKservices</h2>
        <h2 class="cgu-cgu">Article 1 : Objet</h2>
        <p class="cgu-text">Les présentes Conditions Générales de Vente (CGV) ont pour objet de définir les modalités et conditions dans lesquelles MKservices, société spécialisée dans [description des services], fournit ses prestations aux clients. Toute commande effectuée sur le site implique l'acceptation sans réserve des présentes CGV.</p>
    
    
        <h2 class="cgu-cgu">Article 2 : Prestations proposées</h2>
        <p class="cgu-text">MKservices offre une gamme complète de services aux particuliers et aux professionnels, comprenant :

                - Déménagement : MKservices prend en charge l’ensemble des étapes du déménagement, que ce soit pour les particuliers ou les entreprises. Nos prestations incluent l'emballage, le transport sécurisé, ainsi que le déballage à la destination. Nous proposons des solutions adaptées aux petits et grands déménagements, avec un service de qualité.

                - Livraison : Nous proposons des services de livraison fiables et rapides pour tous types de marchandises. Que vous ayez besoin d'une livraison express ou d'un transport plus volumineux, MKservices garantit la ponctualité et la sécurité des colis livrés à domicile ou en entreprise.

                - Nettoyage particulier et industriel :

                  . Nettoyage particulier : Ce service s’adresse aux particuliers souhaitant un entretien régulier ou ponctuel de leur domicile. Nos équipes assurent le nettoyage des surfaces, vitres, sols, et l’entretien des espaces spécifiques (cuisine, salle de bain, etc.).
                  . Nettoyage industriel : Spécialisée dans le nettoyage des locaux industriels, MKservices intervient dans les entrepôts, usines, et zones de production. Nous utilisons des équipements professionnels pour assurer la propreté de grandes surfaces, en respectant les normes de sécurité et d’hygiène.

                - Bricolage : MKservices propose également des services de bricolage à domicile. Qu’il s’agisse de monter des meubles, de réparer des installations électriques ou de faire de petits travaux de rénovation, nos professionnels sont qualifiés pour intervenir rapidement et efficacement.

                Les détails et tarifs de chaque prestation sont disponibles sur notre site internet [URL du site].</p>

        <h2 class="cgu-cgu">Article 3 : Commandes</h2>
        <p class="cgu-text">Les commandes de prestations peuvent être passées via le site internet de MKservices ou par tout autre moyen convenu entre les parties. Toute commande est ferme et définitive après confirmation écrite de MKservices. Le client s'engage à fournir des informations exactes et complètes lors de la commande.</p>
    

        <h2 class="cgu-cgu">Article 4 : Tarifs et modalités de paiement</h2>
        <p class="cgu-text">Les tarifs des prestations proposées par MKservices sont affichés en euros, hors taxes (HT), conformément à l'exonération de TVA dont bénéficie l'entreprise, en application de l’article 293 B du Code général des impôts (CGI). MKservices se réserve le droit de modifier ses tarifs à tout moment. Cependant, les prestations seront facturées sur la base des tarifs en vigueur au moment de la validation de la commande par le client.

        Le paiement des prestations doit être effectué selon les modalités suivantes :
         . Virement bancaire : Les coordonnées bancaires seront fournies au moment de la commande.

        Toute prestation non réglée dans les délais impartis entraînera l'application de pénalités de retard calculées à un taux de [indiquez le taux applicable], ainsi que l'exigibilité immédiate de la totalité des sommes dues par le client.</p>
    

    
        <h2 class="cgu-cgu">Article 5 : Exécution des prestations</h2>
        <p class="cgu-text">MKservices s'engage à fournir les prestations dans les délais convenus avec le client, sous réserve de la disponibilité des équipes et du matériel nécessaire. En cas de retard, le client sera informé dans les plus brefs délais..</p>
    
        <h2 class="cgu-cgu">Article 6 : Droit de rétractation</h2>
        <p class="cgu-text">Conformément à la législation en vigueur, le client dispose d'un droit de rétractation de 14 jours à compter de la date de commande, sauf pour les prestations déjà exécutées avec l'accord du client avant la fin de ce délai. Pour exercer ce droit, le client doit notifier MKservices par courrier recommandé.</p>

        <h2 class="cgu-cgu">Article 7 : Annulation de commande</h2>
        <p class="cgu-text">En cas d'annulation de commande par le client après le début de l'exécution des prestations, MKservices se réserve le droit de facturer une compensation correspondant aux frais engagés et au travail déjà réalisé..</p>

        <h2 class="cgu-cgu">Article 8 : Responsabilité</h2>
        <p class="cgu-text">MKservices s'engage à réaliser les prestations conformément aux règles de l'art et aux normes en vigueur. En cas de dommages résultant de la mauvaise exécution des prestations, la responsabilité de MKservices sera limitée au montant de la commande concernée.</p>

        <h2 class="cgu-cgu">Article 9 : Protection des données personnelles</h2>
        <p class="cgu-text">MKservices s'engage à respecter la confidentialité des informations fournies par le client. Les données collectées sont nécessaires pour le traitement des commandes et ne seront utilisées que dans ce cadre. Conformément à la loi Informatique et Libertés, le client dispose d'un droit d'accès, de rectification et de suppression de ses données personnelles.</p>

        <h2 class="cgu-cgu">Article 10 : Litiges</h2>
        <p class="cgu-text">En cas de litige, les parties s'engagent à rechercher une solution amiable avant toute action judiciaire. À défaut d'accord, le litige sera soumis à la juridiction compétente du lieu du siège social de MKservices.</p>

        <h2 class="cgu-cgu">Article 11 : Loi applicable</h2>
        <p class="cgu-text">Les présentes CGV sont soumises à la loi française. Toute contestation relative à leur interprétation ou exécution relève des tribunaux compétents.</p>
        
     </section>

    <?php
$contenu = ob_get_clean();
require "template/template.php";
