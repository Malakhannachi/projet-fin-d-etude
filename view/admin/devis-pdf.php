
    <div class="sec-offre">
        <div>
           
            <h3>MKServices</h3>
            <p>24 Rue Jean Giridoux</p>
            <p>76200 Strasbourg</p>
            <p>Tél : 01 23 45 67 89</p>
            <p>Mail : 0kGQ1@example.com</p>
        </div>
        
        <?php
        $unixTime = strtotime($devis['date_dev']);
        $newDate = date("d/m/Y", $unixTime);
        ?>
        
        <div>
            <h3>Devis n°<?= $devis['id_devis'] ?>/2024</h3>
            <p>Le <?= $newDate ?></p>
            <p>Par <?= $devis['nom'] ?></p>
            <p>Adresse email : <?= $devis['email'] ?></p>
            <p>Téléphone : <?= $devis['tel'] ?></p>
            <p>Adresse : <?= $devis['adresse'] ?></p>
            <p><?= $devis['CodePostal'] . ' ' . $devis['ville'] ?></p>
        </div>
    </div>
    
    <div id="impression-devis">
        <?php 
        $totalTva = $devis['qte'] * $devis['prix_ht'];
        $total = $totalTva * (1 + $devis['tva'] / 100);
        ?>
        
        <table class="table-devis table">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Nbre de jour</th>
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
                    <td><?= number_format($total, 2) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div>
        <p>Montant du devis : <?= number_format($total, 2) ?> €</p>
        <p>Validité du devis : 3 mois</p>
        <p>Merci pour votre confiance, <?= $devis['nom'] ?>. Nous restons à votre disposition pour toute information complémentaire.</p>
        <p>Cordialement,</p>
    </div>

