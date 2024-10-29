<?php
// models/Service.php

namespace Model;

use PDO;

class Service
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getServices()
    {
        $stmt = $this->db->query("SELECT * FROM services");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServicesByCategory()
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM cat
            INNER JOIN services ON cat.id_Cat = services.id_Cat
        ");
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cats = [];
        foreach ($results as $row) {
            $cats[$row['id_Cat']]['nom_Cat'] = $row['nom_Cat'];
            $cats[$row['id_Cat']]['services'][] = [
                'id_Services' => $row['id_Services'],
                'nom_Ser' => $row['nom_Ser'],
            ];
        }
        return $cats;
    }

    public function getServiceDetails($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM services WHERE id_Services = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
