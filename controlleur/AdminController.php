<?php

namespace Controlleur;

use Model\Connect;
use PDO;


class AdminController
{
    //liste devis
    public function listDev()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT * 
        FROM devis");
        $devis = $requete->fetchAll(PDO::FETCH_ASSOC);

        require "view/admin/listDev.php";
    }

    // modifier devis
    public function editDevis($id)
    {
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM devis WHERE id_Devis = :id");
        $requete->execute(['id' => $id]);
        $devis = $requete->fetch(PDO::FETCH_ASSOC);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $tel = $_POST['tel'] ?? '';
            $email = $_POST['email'] ?? '';
            $besoin = $_POST['besoin'] ?? '';
            
            $requete = $pdo->prepare("
            UPDATE devis 
            SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, besoin = :besoin 
            WHERE id_Devis = :id
            ");
            $requete->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'tel' => $tel,
                'email' => $email,
                'besoin' => $besoin,
                'id' => $id
            ]);
            
            header('Location:index.php?action=listDev');
            exit();
        }
        
        require "view/admin/editDevis.php";
    }
    // supprimer devis
    public function deleteDevis($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("DELETE FROM devis WHERE id_Devis = :id");
        $requete->execute(['id' => $id]);
        
        header('Location:index.php?action=listDev');
        exit();
    }

    // lister Avis
    public function listAvis()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM avis");
        $avis = $requete->fetchAll(PDO::FETCH_ASSOC);
    
        require 'view/admin/listAvis.php';
    }
    // Ajouter Avis
    public function addAvis()
{
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and validate input
        $commentaire = $_POST['commentaire'] ?? '';
        $note = $_POST['note'] ?? '';
        $id_Services = $_POST['id_Services'] ?? 1;
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $image = $_FILES['image']['name'] ?? '';

        // ajouter test sur l'image

        if (empty($errors)) {

            $uploadDirectory = __DIR__ . '/../public/image/';

            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileSize = $_FILES['image']['size'];
                $fileType = $_FILES['image']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                    $dest_path = $uploadDirectory . $newFileName;
    
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $image = $newFileName;
                    } else {
                        echo 'There was an error moving the uploaded file.';
                    }
                } else {
                    echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }

            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("
                INSERT INTO avis (commentaire, note, id_Services, nom, prenom, email, tel, image, date_Avis)
                VALUES (:commentaire, :note, :id_Services, :nom, :prenom, :email, :tel, :image, NOW())
            ");
            $requete->execute([
                'commentaire' => $commentaire,
                'note' => $note,
                'id_Services' => $id_Services,
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'tel' => $tel,
                'image' => $image
            ]);

            header('Location: index.php?action=listAvis');
        }
    }

    require 'view/admin/addAvis.php';
}
// modifier Avis
public function editAvis($id)
{
    $pdo = Connect::seConnecter();
    $query = $pdo->prepare("
    SELECT * 
    FROM avis 
    WHERE id_Avis = :id");
    $query->execute(['id' => $id]);
    $avis = $query->fetch();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $commentaire = $_POST['commentaire'] ?? '';
        $note = $_POST['note'] ?? '';
        $id_Services = $_POST['id_Services'] ?? 1;
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $image = $_FILES['image']['name'] ?? $avis['image'];

        $uploadDirectory = __DIR__ . '/../public/image/';  //remplacer par le chemin absolu de votre dossier image

        // echo $uploadDirectory;
        // die();

        // fichier uploade
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedfileExtensions)) {
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $dest_path = $uploadDirectory . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $image = $newFileName;
                } else {
                    echo 'There was an error moving the uploaded file.';
                }
            } else {
                echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
            }
        }

        $requete = $pdo->prepare("
            UPDATE avis SET 
            commentaire = :commentaire,
            note = :note,
            id_Services = :id_Services,
            nom = :nom,
            prenom = :prenom,
            email = :email,
            tel = :tel,
            image = :image
            WHERE id_Avis = :id
        ");
        $requete->execute([
            'commentaire' => $commentaire,
            'note' => $note,
            'id_Services' => $id_Services,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'tel' => $tel,
            'image' => $image,
            'id' => $id
        ]);

        header('Location:index.php?action=listAvis');
    }

    require 'view/admin/editAvis.php';
}
// supprimer Avis
public function deleteAvis($id)
{
    $pdo = Connect::seConnecter();
    $query = $pdo->prepare("DELETE FROM avis WHERE id_Avis = :id");
    $query->execute(['id' => $id]);

    header('Location:index.php?action=listAvis');
}
}
