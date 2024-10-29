<?php

namespace Controlleur;

use Model\Avis;
use Model\Connect;
use PDO;

class AvisController
{
    private $avisModel;

    public function __construct()
    {
        $this->avisModel = new Avis(Connect::seConnecter());
    }

    public function avis($page = 1, $avisPerPage = 6)
    {
        $totalAvis = $this->avisModel->getTotalAvisCount();
        $totalPages = ceil($totalAvis / $avisPerPage);
        $avis = $this->avisModel->getPaginatedAvis($page, $avisPerPage);

        require("view/avis.php");
    }
    
    public function pageAvis()
    {
        require("view/addAvis.php");    
    }
    public function secAvis()
    {
        require("view/secAvis.php");
    }
    
    public function addAvis(){
        $errors = [];
        $pdo = Connect::seConnecter();
        if (isset($_POST['submit'])) {
            $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (empty($commentaire)) {
                $errors['commentaire'] = "Le commentaire est requis.";
            }
            if (empty($note)) {
                $errors['note'] = "La note est requise.";
            }
            
            $uploadDirectory = __DIR__ . '/../public/image/';
        
            // Vérifier l'existence de l'image
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                $fileSize = $_FILES['image']['size'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
        
                // Extensions et types MIME autorisés
                $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
                // Vérifier le type MIME du fichier
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($finfo, $fileTmpPath);
                finfo_close($finfo);
        
                // Limite de taille de fichier
                $maxFileSize = 2 * 1024 * 1024; // 2 Mo
        
                if (in_array($fileExtension, $allowedfileExtensions) && in_array($mimeType, $allowedMimeTypes) && $fileSize <= $maxFileSize) {
                    // Vérifier que le répertoire est accessible
                    if (is_dir($uploadDirectory) && is_writable($uploadDirectory)) {
                        // Générer un nom de fichier unique et sécurisé
                        $newFileName = bin2hex(random_bytes(16)) . '.' . $fileExtension;
                        $dest_path = $uploadDirectory . $newFileName;
        
                        // Déplacer le fichier vers la destination
                        if (move_uploaded_file($fileTmpPath, $dest_path)) {
                            $image = $newFileName;
                        } else {
                            $errors['upload'] = "Erreur lors du déplacement du fichier.";
                        }
                    } else {
                        $errors['upload'] = "Le répertoire de destination n'existe pas ou n'est pas accessible.";
                    }
                } else {
                    $errors['image'] = "Le fichier n'est pas valide ou dépasse la taille maximale autorisée.";
                }
            } else {
                $errors['image'] = "Erreur lors de l'upload du fichier.";
            }
            date_default_timezone_set('Europe/Paris');
            if (empty($errors)){
                $requete = $pdo->prepare("
                    INSERT INTO avis (commentaire, note, date_Avis, id_User)
                    VALUES (:commentaire, :note, :date_Avis, :id_User)
                ");
                $requete->execute([
                    'commentaire' => $commentaire,
                    'note' => $note,
                    'date_Avis' => date('Y-m-d H:i:s'),
                    'id_User' => $_SESSION['user']['id_User'] // prend l'id de l'utilisateur connecté
                ]);
                //modifier tableau 
                $requete = $pdo->prepare("
                UPDATE users SET image = :image WHERE id_User = :id_User 
                ");
                $requete->execute([
                    'image' => $image,
                    'id_User' => $_SESSION['user']['id_User']
                ]);
                header('Location: index.php?action=secAvis');
                exit;
            } else {
                //var_dump($errors);
                //die();
                $_SESSION['errors'] = $errors;
                header('Location: index.php?action=pageAvis');
                exit;
            }
                    
    
        }
    }

    public function delAv($id)
    {
        $this->avisModel->deleteAvis($id);
        header("Location: index.php?action=admin");
    }
}
