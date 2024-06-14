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

    public function admin()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT devis.id_Devis, devis.date_Devis, devis.besoin, users.nom
        FROM devis
        INNER JOIN users ON devis.id_User = users.id_User; ");

        $requeteAvis = $pdo->query("
        SELECT avis.commentaire, avis.date_Avis, avis.note, services.nom_Ser, users.nom
        FROM avis
        INNER JOIN services ON services.id_Services = avis.id_Services
        INNER JOIN users ON avis.id_User = users.id_User;  ");


        require ("view/admin.php");

    }

    public function addDevis()
    {
        $pdo = Connect::seConnecter();
        $requeteDev = $pdo->query("
        INSERT INTO devis( date_Devis, besoin, id_User)
        VALUES (:date_Devis, :besoin, :id_User)");
        require ("view/addDevis.php");
    }
    
}