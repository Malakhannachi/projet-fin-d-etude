<?php
// models/Avis.php

namespace Model;

use PDO;

class Avis
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPaginatedAvis($page, $avisPerPage)
    {
        $offset = ($page - 1) * $avisPerPage;

        $stmt = $this->db->prepare("
            SELECT * 
            FROM avis
            INNER JOIN users ON avis.id_User = users.id_User 
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $avisPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalAvisCount()
    {
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM avis");
        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function addAvis($commentaire, $note, $id_User)
    {
        $stmt = $this->db->prepare("
            INSERT INTO avis (commentaire, note, date_Avis, id_User)
            VALUES (:commentaire, :note, :date_Avis, :id_User)
        ");
        return $stmt->execute([
            'commentaire' => $commentaire,
            'note' => $note,
            'date_Avis' => date('Y-m-d H:i:s'),
            'id_User' => $id_User
        ]);
    }

    public function deleteAvis($id)
    {
        $stmt = $this->db->prepare("DELETE FROM avis WHERE id_Avis = :id");
        return $stmt->execute(['id' => $id]);
    }
}
