<?php

namespace Controlleur;

use Model\Connect;

 class Controller {

    public function accueil()  
    {

        require ("view/accueil.php");
    }
    public function devis()
    {
        
        require ("view/devis.php");
    }

    public function listDevis()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT devis.id_Devis, devis.date_Devis, devis.besoin, users.nom
        FROM devis
        INNER JOIN users ON devis.id_User = users.id_User; ");
        require ("view/admin.php");

    }
}