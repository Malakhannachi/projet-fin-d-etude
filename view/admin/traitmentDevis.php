<?php ob_start(); ?>

<!-- hero section -->
<section id="hero-devis">    
    <h1 class="devis-hero"> Devis</h1>
    
</section>

<section id="devis" class="devis-background1">
    <div>
        <img class="logo" src="public/image/logo_mk.png" alt="logo"/>
        <h3>MKServices</h3>
        <p>24 Rue Jean Giridoux </p>
        <p>76200 Strasbourg </p>
        <p>Tél : 01 23 45 67 89</p>
        <p>Mail : 0kGQ1@example.com</p>
    </div>
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
    ?>
    
    
    <div class="form devis-background2">
        <h2 class="title-devis1">Devis N°:<?php echo htmlspecialchars($formattedId.'-'.date('Y'));?></h2>
        <p class="text-devis1">Client : <?php echo htmlspecialchars($demandeDevis['nom'] . ' ' . $demandeDevis['prenom']);?></p>
        <p class="text-devis1">Email : <?php echo htmlspecialchars($demandeDevis['email']);?></p>
        <p class="text-devis1">Telephone : <?php echo htmlspecialchars($demandeDevis['tel']);?></p>
        <p class="text-devis1">adresse : <?php echo htmlspecialchars($demandeDevis['adresse']);?></p>
        <p class="text-devis1"><?php echo htmlspecialchars($demandeDevis['CodePostal'] . ' ' . $demandeDevis['ville']);?></p>
        <?php date_default_timezone_set('Europe/Paris'); // changer le fuseau horaire
            $dateDuJour = date("d/m/Y");?>
            <p class="text-devis1">Date : <?php echo htmlspecialchars($dateDuJour);?></p>

            <form action="index.php?action=traitmentDevis&id=<?php echo htmlspecialchars($demandeDevis['id_Dem'])?>" method="post" class="formulaire">
                <div>
                    <input type="texte" name="intitule" id=" intitule" value=" <?php echo htmlspecialchars($demandeDevis['besoin']);?>" class="input">
                </div>
                <div class="list">
                    <input type="hidden" name="id_Dem" value="<?php echo htmlspecialchars($demandeDevis['id_Dem']);?>">
                    <label for="intitule" class="label-devis"> Désignation</label>
                    <input type="text" name="nom_Ser" id="nomSer" value="<?php echo htmlspecialchars($demandeDevis['nom_Ser']);?>">
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo htmlspecialchars($demandeDevis['besoin']);?></textarea>
                    <label for="quantité" class="quantité"> Nbre de jour</label>
                    <input type="text" name="qte" id="qte" oninput="calculerTTC()">
                    <label for="prixHt" class="prixHt"> P.U.HT</label>
                    <input type="text" name="prix_ht" id="prixHt_Form" oninput="calculerTTC()">
                    <label for="tva" class="tva"> TVA %</label>
                    <input type="text" name="tva" id="tva" readonly value="20">
                    <label for="montant" class="montantTva"> Montant TVA</label>
                    <input type="text" name="montant" disabled  id="Mtva_Form" >
                    <label for="montant" class="montantTva"> Total TTC</label>
                    <input type="text" name="ttc"  disabled id="Mttc_Form" >
                    
                </div>

                <div class="list">
                    <button class="btn-avis" type="submit" name="submit">Mettre à jour <span>&#x2197;</span></button>
                </div>
            </form>

        
       
    </div>
</section>


<script>
    function calculerTTC() {
        var quantite = parseFloat(document.getElementById("qte").value) || 0;
        var prixHT = parseFloat(document.getElementById("prixHt_Form").value) || 0;
        var tva = parseFloat(document.getElementById("tva").value) || 20;

        var montantHT = quantite * prixHT;
        var montantTVA = montantHT * (tva / 100);
        var totalTTC = montantHT + montantTVA;

        document.getElementById("Mtva_Form").value = montantTVA.toFixed(2);
        document.getElementById("Mttc_Form").value = totalTTC.toFixed(2);
    }
</script>

<?php
$contenu = ob_get_clean();
require "template/template.php";
?>
