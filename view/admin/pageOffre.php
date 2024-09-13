
<section id="hero-devis">    
    <h1 class="devis-hero"> Devis</h1>
    
</section>

<section id="offre" class="devis-background1">
    <div class="sec-offre">

    <div>
        <img class="logo" src="public/image/logo_mk.png" alt="logo"/>
        <h3>MKServices</h3>
        <p>24 Rue Jean Giridoux </p>
        <p>76200 Strasbourg </p>
        <p>Tél : 01 23 45 67 89</p>
        <p>Mail : 0kGQ1@example.com</p>
    </div>
    
    <?php
    // Unix time = 1685491200 à l'aide de la fonction strtotime
    $unixTime = strtotime($devis['date_dev']);
    
    //CHENAGER LA FORMAT 
    $newDate = date("d/m/Y", $unixTime);
    
    ?>
    <div>
        <h3>Devis n°<?= $devis['id_devis'] ?>/2024</h3>
        <p>Le <?= $newDate ?></p>
        <p>Par <?= $devis['nom'] ?></p>
        <p>Adresse email : <?= $devis['email'] ?></p>
        <p>Téléphone : <?= $devis['tel'] ?></p>
        <p>Adresse : <?= $devis['adresse'] ?></p>
        <p><?= $devis['CodePostal'] . ' ' . $devis['ville'] ?></p>
    </div>
    
    </div>
    <div id="impression-devis">
        <?php 
        $totalTva = $devis['qte'] * $devis['prix_ht'] ;
        $total = $totalTva * (1 + $devis['tva'] / 100)  ;
        ?>
        
       
        <table class="table-devis table">
            <thead>
        <tr>
            <th>Désignation</th>
            <th>Nbre de jour </th>
            <th>Prix.U.HTVA</th>
            <th>Total HTVA</th>
            <th>Total TVA</th>
            <th>Total TTC</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $devis['besoin'] ?></td>
            <td><?= $devis['qte'] ?></td>
            <td><?= $devis['prix_ht'] ?></td>
            <td><?= number_format($totalTva, 2) ?></td>
            <td><?= $devis['tva'] ?></td>
            <td><?= number_format($total , 2)  ?> 
            </td>
        </tr>
        
        </tbody>

        </table>
    </div>
    <div>
        <p>
            montant de la de la devix est de : <?= $total  ?>
        </p>
        <p>
            validité du devis : 3 mois 
        </p>
        <p>
            Merci pour votre confiance , <?= $devis['nom'] ?>, Nous restons à votre disposition pour toute information complémentaire ou assistance supplémentaire
        </p>
        <p>
            Cordialement,
        </p>
    </div>

    <a href="index.php?action=imprimDevis&id=<?= $devis['id_devis'] ?>"  class="btn-avis" > imprimer le Devis</a>
</section>
<!--<script>
function printDevis() {
     var printContents = document.getElementById('impression-devis').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script> -->


<?php
    // afficher numero de devis avec condition de longueur et ajouter plus 1  dans id devis pour calculer le numero de devis
    $IdDev = $devis['id_devis']+1;
    if (strlen($IdDev) == 1) {
        $formattedId = '00' . $IdDev;
    } elseif (strlen($IdDev) == 2) {
        $formattedId = '0' . $IdDev;
    } else {
        $formattedId = $IdDev;
    }



     $contenu = ob_get_clean(); 
     require "template/template.php"; 
    ?>


