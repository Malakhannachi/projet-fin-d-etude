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
        if (isset($_POST['submit']))
        {
            $date_Devis = filter_input(INPUT_POST, "date_Devis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $besoin = filter_input(INPUT_POST, "besoin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_User = filter_input(INPUT_POST, "id_User", FILTER_SANITIZE_NUMBER_INT);
            $id_User = $_SESSION["user"]["id_User"]; 
            if ($date_Devis && $besoin && $id_User)
            {
                $requeteDev = $pdo->prepare("
                    INSERT INTO devis( date_Devis, besoin, id_User)
                    VALUES (:date_Devis, :besoin, :id_User)");
                $requeteDev->execute
                ([
                    "date_Devis" => $date_Devis,
                    "besoin" => $besoin,
                    "id_User" => $id_User

                ]);

            }
        }
        $id_User = $pdo->query
        (
            "SELECT * 
            FROM users"
        );
        require ("view/addDevis.php");
    }
    public function delDev($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDel = $pdo-> prepare
        ("
            DELETE FROM devis 
            WHERE devis.id_Devis = :id"
        );
        $requeteDel-> execute
        ([
            "id"=>$id
        ]);
        ?>
        
        <?php
        header("Location: index.php?action=admin");
 
    }
    public function addAvis()
    {
        $pdo = Connect::seConnecter();
        if (isset($_POST['submit']))
        {
            $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $besoin = filter_input(INPUT_POST, "besoin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_User = filter_input(INPUT_POST, "id_User", FILTER_SANITIZE_NUMBER_INT);
            $id_User = $_SESSION["user"]["id_User"]; 
            if ($commentaire && $besoin && $id_User)
            {
                $requeteDev = $pdo->prepare("
                    INSERT INTO devis( date_Devis, besoin, id_User)
                    VALUES (:date_Devis, :besoin, :id_User)");
                $requeteDev->execute
                ([
                    "commentaire" => $commentaire,
                    "besoin" => $besoin,
                    "id_User" => $id_User

                ]);

            }
        }
        $id_User = $pdo->query
        (
            "SELECT * 
            FROM users"
        );
        require ("view/addDevis.php");
    }
    
}