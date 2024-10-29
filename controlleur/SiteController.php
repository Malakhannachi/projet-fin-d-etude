<?php

namespace Controlleur;

use Model\Connect;
use PDO;

class SiteController
{
    public function accueil()
    {
        $pdo = Connect::seConnecter();
        $services = $pdo->query("SELECT * FROM services LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        $avis = $pdo->query("SELECT * FROM avis INNER JOIN users ON avis.id_User = users.id_User LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        $serDev = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);

        require("view/accueil.php");
    }

    public function contact()
    {
        require("view/contact.php");
    }

    public function cgu()
    {
        require("view/cgu.php");
    }

    public function cgv()
    {
        require("view/cgv.php");
    }
}
