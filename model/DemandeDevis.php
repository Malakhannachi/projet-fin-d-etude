<?php
// models/DemandeDevis.php

namespace Model;

use PDO;

class DemandeDevis
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addDemande($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO demande_devis (nom, prenom, tel, email, ville, codePostal, adresse, id_Services, besoin, date_Dem, id_User)
            VALUES (:nom, :prenom, :telephone, :email, :ville, :codePostal, :adresse, :id_Services, :besoin, :date_Dem, :id_User)
        ");
        return $stmt->execute($data);
    }

    public function deleteDevis($id)
    {
        $stmt = $this->db->prepare("DELETE FROM demande_devis WHERE id_Devis = :id");
        return $stmt->execute(['id' => $id]);
    }
}
