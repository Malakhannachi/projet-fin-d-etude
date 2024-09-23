<?php

namespace Controlleur;

use Model\Connect;
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
use PDO;


class AdminController
{
    /*--===== Section Devis ========--*/
    //liste devis
    public function listDemandeDevis()
    {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM demande_devis
        ORDER BY date_Dem DESC");
        $devis = $requete->fetchAll();

        // var_dump($devis);
        // die();

        require "view/admin/listDemandeDevis.php";
    }
    

    // modifier devis
    public function editDevis($id)
    {

        $pdo = Connect::seConnecter();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];  // filtrer codes malveillants
            $prenom = $_POST['prenom'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $besoin = $_POST['besoin'];

            // ajouter les filtres des "input" 

            $requete = $pdo->prepare("
            UPDATE demande_devis 
            SET nom = :nom, prenom = :prenom, tel = :tel, email = :email, besoin = :besoin 
            WHERE id_Dem = :id
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
        } else { // if ($_SERVER['REQUEST_METHOD'] === 'GET')
            //afficher le formulaire rempli avec les infos
            $requete = $pdo->prepare("SELECT * FROM demande_devis WHERE id_Dem = :id");
            $requete->execute(['id' => $id]);
            $devis = $requete->fetch(PDO::FETCH_ASSOC);

            require "view/admin/editDevis.php";
        }
    }
    // supprimer devis
    public function deleteDevis($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("DELETE FROM demande_devis WHERE id_Dem = :id");
        $requete->execute(['id' => $id]);

        header('Location:index.php?action=listDev');
        exit();
    }
// Afficher liste des devis
    public function listDev() 
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM devis 
        INNER JOIN demande_devis ON devis.id_Dem = demande_devis.id_Dem
        ORDER BY date_dev DESC");
        $dev = $requete->fetchAll();
        require "view/admin/listDev.php";
    }

    // afficher page traiter un devis
    public function pageOffre($id)
{
    // Connexion à la base de données et récupération des données du devis
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
        SELECT * 
        FROM devis
        INNER JOIN demande_devis ON devis.id_Dem = demande_devis.id_Dem 
        WHERE devis.id_devis = :id
    ");
    $requete->execute(['id' => $id]);
    $devis = $requete->fetch(PDO::FETCH_ASSOC);
    // var_dump($id);
    // die();
   if (!$devis) {
        echo "Le devis n'existe pas.";
        return;
    }

    // Commencer la mise en tampon de sortie pour capturer le contenu HTML de la page
    require 'view/admin/pageOffre.php';

}
    public function imprimDevis($id)
{
    // Connexion à la base de données et récupération des données du devis
    $pdo = Connect::seConnecter();
    $requete = $pdo->prepare("
        SELECT * 
        FROM devis
        INNER JOIN demande_devis ON devis.id_Dem = demande_devis.id_Dem 
        WHERE devis.id_devis = :id
    ");
    $requete->execute(['id' => $id]);
    $devis = $requete->fetch(PDO::FETCH_ASSOC);
    // var_dump($id);
    // die();
   if (!$devis) {
        echo "Le devis n'existe pas.";
        return;
    }

    // Commencer la mise en tampon de sortie pour capturer le contenu HTML de la page
    
    ob_start();  // Commencer la mise en tampon de sortie
    
    require 'view/admin/devis-pdf.php'; // Afficher le contenu HTML de la page
    $html = ob_get_clean();  // Capturer le contenu HTML de la page

    // var_dump($html);
    // die();

    // Générer le PDF
   
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("offre_{$devis['id_Dem']}.pdf", ['Attachment' => 0]);
}

    // traitter un devis 
    public function traitmentDevis($id)
    {
        $pdo = Connect::seConnecter();
        if (isset($_POST['submit'])) {
            $nom_Ser = filter_input(INPUT_POST, "nom_Ser", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $qte = filter_input(INPUT_POST, "qte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prix_ht = filter_input(INPUT_POST, "prix_ht", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tva = filter_input(INPUT_POST, "tva", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $montant = filter_input(INPUT_POST, "montant", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ttc = filter_input(INPUT_POST, "ttc", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $intitule = filter_input(INPUT_POST, "intitule", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $erreur = [];
            if (empty($nom_Ser)) {
                $erreur['nom_Ser'] = "Le nom du service est requis";
            }
            if (empty($qte)) {
                $erreur['qte'] = "La quantité est requise";
            }
            if (empty($prix_ht)) {
                $erreur['prix_ht'] = "Le prix HT est requis";
            }
            if (empty($tva)) {
                $erreur['tva'] = "La TVA est requise";
            }
            if (empty($montant)) {
                $erreur['montant'] = "Le montant est requis";
            }
            if (empty($ttc)) {
                $erreur['ttc'] = "Le montant TTC est requis";
            }
            //var_dump($tva);
            //die();
            $requete = $pdo->prepare("
            INSERT INTO devis ( qte, prix_ht, tva, id_Dem, date_dev, intitule) 
            VALUES ( :qte, :prix_ht, :tva, :id_Dem, :date_dev, :intitule)");
            $requete->execute([
                'qte' => $qte,
                'prix_ht' => $prix_ht,
                'tva' => $tva,
                'id_Dem' => $id,
                'date_dev' => date('Y-m-d'),
                'intitule' => $intitule
            ]);
            header('Location:index.php?action=listDev');
            
            
        }else {
           
            // recuprer les données de table demande devis 
            $requete = $pdo->prepare("
                SELECT * FROM demande_devis
                INNER JOIN services ON demande_devis.id_Services = services.id_Services
                WHERE demande_devis.id_Dem = :id
                ");
            $requete->execute(['id' => $id]);
            $demandeDevis = $requete->fetch(PDO::FETCH_ASSOC); 
            $requeteDevis = $pdo->prepare("SELECT * FROM devis ORDER BY id_devis DESC LIMIT 1");
            $requeteDevis->execute();
            $devis = $requeteDevis->fetch(PDO::FETCH_ASSOC);
            // var_dump($devis);
            // die();
            
            require "view/admin/traitmentDevis.php";
        }
    }
/*--===== Section Avis ========--*/
    // lister Avis

    public function listAvis()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT * 
        FROM avis");
        $avis = $requete->fetchAll();

        // var_dump($avis);
        // die();



        require "view/admin/listAvis.php";
    }
    

    // supprimer Avis

    public function deleteAvis($id)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("DELETE FROM avis WHERE id_Avis = :id");
        $requete->execute(['id' => $id]);

        header('Location:index.php?action=listAvis');
        exit();
    }

    //modifier Avis
    public function editAvis($id)

    {
        // var_dump($id);
        // die();
        $pdo = Connect::seConnecter();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'];  
            $prenom = $_POST['prenom'];  
            $commentaire = $_POST['commentaire'];
            $note = $_POST['note'];
            $image = $_FILES['image']['name'];

            // var_dump($nom, $prenom, $commentaire, $note);
            // die();
            // modifier l'image
            $uploadDirectory = __DIR__ . '/../public/image/';  //remplacer par le chemin absolu de votre dossier image

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                //var_dump($_FILES['image']['name']);
                //die();

                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];    // nom du fichier
                $fileSize = $_FILES['image']['size'];   // taille du fichier
                $fileType = $_FILES['image']['type'];   // type du fichier
                $fileNameCmps = explode(".", $fileName); // nom du fichier
                $fileExtension = strtolower(end($fileNameCmps)); // extension du fichier
                $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensions autorisées

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;   // md5 pour le nom de l'image unique
                    $dest_path = $uploadDirectory . $newFileName;                    // destination du fichier

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {                   // deplacer le fichier
                        $image = $newFileName;
                    } else {
                        echo 'There was an error moving the uploaded file.';
                    }
                } else {
                    echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }

            $requete = $pdo->prepare("
            UPDATE avis 
            SET nom = :nom, prenom = :prenom, commentaire = :commentaire, note = :note, image = :image
            WHERE id_Avis = :id
            ");
            $requete->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'commentaire' => $commentaire,
                'note' => $note,
                'image' => $image,
                'id' => $id
            ]);

            header('Location:index.php?action=listAvis');
            exit();
        } else {
            // afficher le formulaire 
            $requete = $pdo->prepare("SELECT * FROM avis WHERE id_Avis = :id");
            $requete->execute(['id' => $id]);
            $avis = $requete->fetch(PDO::FETCH_ASSOC);

            require "view/admin/editAvis.php";
        }
    }

    public function listService()
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM services
        LEFT JOIN cat ON services.id_Cat = cat.id_Cat");
        $services = $requete->fetchAll();
        // var_dump($services);
        // die();
        require "view/admin/listService.php";
    }

    public function editServices($id)
    {
        $pdo = Connect::seConnecter();
        if (isset($_POST['submit'])) {
            $nom_Ser = $_POST['nom_Ser'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $id_Cat = $_POST['id_Cat'];
            // modifier l'image
            $uploadDirectory = __DIR__ . '/../public/image/';  //remplacer par le chemin absolu de votre dossier image

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                //var_dump($_FILES['image']['name']);
                //die();

                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];    // nom du fichier
                $fileSize = $_FILES['image']['size'];   // taille du fichier
                $fileType = $_FILES['image']['type'];   // type du fichier
                $fileNameCmps = explode(".", $fileName); // nom du fichier
                $fileExtension = strtolower(end($fileNameCmps)); // extension du fichier
                $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensions autorisées

                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;   // md5 pour le nom de l'image unique
                    $dest_path = $uploadDirectory . $newFileName;                    // destination du fichier

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {                   // deplacer le fichier
                        $image = $newFileName;
                    } else {
                        echo 'There was an error moving the uploaded file.';
                    }
                } else {
                    echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                }
            }
            //modifier le service
            $requete = $pdo->prepare("
            UPDATE services
            SET nom_Ser = :nom_Ser, description = :description, image = :image, id_Cat = :id_Cat
            WHERE id_Services = :id_Services
            ");
            $requete->execute([
                'nom_Ser' => $nom_Ser,
                'description' => $description,
                'image' => $image,
                'id_Cat' => $id_Cat,
                'id_Services' => $id
            ]);
            header('Location:index.php?action=listService');
            exit();
            //afficher  le formulaire suite un click sur modifier 
        } else {
            $requete = $pdo->prepare("
            SELECT * 
            FROM services 
            WHERE id_Services = :id");
            $requete->execute(['id' => $id]);
            $service = $requete->fetch(PDO::FETCH_ASSOC);
            //afficher les categories
            $requeteCat = $pdo->query("
            SELECT *
            FROM cat");
            $categories = $requeteCat->fetchAll();
            require "view/admin/editServices.php";
        }
    }
    public function addService()
    {
        // var_dump("inside addService method");
        // die();

        $pdo = Connect::seConnecter();
        if (isset($_POST['submit'])) {
            // var_dump("inside addService POST method");
            // die();
            $nom_Ser = filter_input(INPUT_POST, "nom_Ser", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $image = $_FILES['image']['name'];
            $id_Cat = filter_input(INPUT_POST, "id_Cat", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $errors = [];
            if (empty($nom_Ser)) {
                $errors['nom_Ser'] = "Le nom est requis.";
            }
            if (empty($description)) {
                $errors['description'] = "La description est requise.";
            }
            if (empty($id_Cat)) {
                $errors['id_Cat'] = "Le type est requis.";
            }
            if (empty($errors)) {
                //ajouter une nouvelle image

                $uploadDirectory = __DIR__ . '/../public/image/';  //remplacer par le chemin absolu de votre dossier image
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['image']['tmp_name'];
                    $fileName = $_FILES['image']['name'];    // nom du fichier
                    $fileSize = $_FILES['image']['size'];   // taille du fichier
                    $fileType = $_FILES['image']['type'];   // type du fichier
                    $fileNameCmps = explode(".", $fileName); // nom du fichier
                    $fileExtension = strtolower(end($fileNameCmps)); // extension du fichier
                    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensions autorisées

                    if (in_array($fileExtension, $allowedfileExtensions)) {
                        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;   // md5 pour le nom de l'image unique
                        $dest_path = $uploadDirectory . $newFileName;                    // destination du fichier

                        if (move_uploaded_file($fileTmpPath, $dest_path)) {                   // deplacer le fichier
                            $image = $newFileName;
                        } else {
                            echo 'There was an error moving the uploaded file.';
                        }
                    } else {
                        echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                    }
                }
                //ajouter le service
                $requete = $pdo->prepare("
                INSERT INTO services
                (nom_Ser, description, image, id_Cat)
                VALUES
                (:nom_Ser, :description, :image, :id_Cat)");
                $requete->execute([
                    'nom_Ser' => $nom_Ser,
                    'description' => $description,
                    'image' => $image,
                    'id_Cat' => $id_Cat
                ]);
                header('Location:index.php?action=listService');
                exit();
                //afficher  le formulaire suite un click sur ajouter    
            } 
        } else {
            // var_dump("inside addService GET request");
            // die();

            //afficher les categories
            $requeteCat = $pdo->query(" SELECT * FROM cat");
            $categories = $requeteCat->fetchAll();
            require "view/admin/addService.php";
        }
    }
    public function deleteService($id)
    {
        $pdo = Connect::seConnecter();
        $pdo->exec("DELETE FROM services WHERE id_Services = $id");
        //var_dump("service supprime");
       // die();
        header('Location:index.php?action=listService');
        exit();
    }

    //page profil

    public function profil($id){

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("SELECT * FROM users WHERE id_User = $id");
        $user = $requete->fetch();
        require "view/admin/profil.php";
    }
}
