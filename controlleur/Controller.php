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
        SELECT categorie.id_categorie, categorie.categorie
        FROM categorie
        WHERE id_categorie = 1");
        
        require ("view/admin.php");

    }
}