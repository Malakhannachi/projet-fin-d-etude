<?php

namespace Controlleur;

use Model\Connect;
use PDO;

class Controller
{

    public function accueil()
    {
        //section des services

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT * 
            FROM services
        ");
        $services = $requete->fetchAll(PDO::FETCH_ASSOC);

        //section des avis

        $requete = $pdo->query("
            SELECT * 
            FROM avis limit 3
        ");
        $avis = $requete->fetchAll(PDO::FETCH_ASSOC);

        require("view/accueil.php");
    }

    //page Devis
    public function devis()
    {

        require("view/devis.php");
    }

    //Page Avis
    public function avis()
    {
        $pdo = Connect::seConnecter();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $avisPerPage = 6;
        $offset = ($page - 1) * $avisPerPage;

        // faire une requete pour compter le nombre d'avis
        $totalAvisQuery = $pdo->query("SELECT COUNT(*) as count FROM avis");
        $totalAvis = $totalAvisQuery->fetch(PDO::FETCH_ASSOC)['count'];

        // calculer le nombre total de pages
        $totalPages = ceil($totalAvis / $avisPerPage);

        // faire une requete pour recuperer les avis
        $requete = $pdo->prepare("SELECT * FROM avis LIMIT :limit OFFSET :offset");
        $requete->bindValue(':limit', $avisPerPage, PDO::PARAM_INT);
        $requete->bindValue(':offset', $offset, PDO::PARAM_INT);
        $requete->execute();

        $avis = $requete->fetchAll(PDO::FETCH_ASSOC);

        // afficher la vue avec les avis

        require("view/avis.php");
    }
    //page contact
    public function contact()
    {

        require("view/contact.php");
    }

    //page service détail
    public function serviceDet($id)
    {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("SELECT * FROM services WHERE id_Services = :id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $service = $requete->fetch(PDO::FETCH_ASSOC);

        // var_dump($service);

        if (!$service) {
            header("Location: /404");
            exit();
        }

        require("view/serviceDet.php");
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


        require("view/admin.php");
    }
    //page pour afficher un msg de succées 
    public function secDev()
    {
        require("view/secDev.php");
    }
    //Ajouter un Devis
    public function addMyDevis()
    {
        $pdo = Connect::seConnecter();

        if (isset($_POST['submit'])) {
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);  // filtrer codes malveillants
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $telephone = filter_input(INPUT_POST, "telephone", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $liste_Service = filter_input(INPUT_POST, "liste_Service", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $besoin = filter_input(INPUT_POST, "besoin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump("inside post");
            // die();
            //var_dump($nom, $prenom, $telephone, $email, $liste_Service, $besoin);die();
            $errors = [];
            // Validation
            if (empty($nom)) {
                $errors['nom'] = "Le nom est requis.";
            }
            if (empty($prenom)) {
                $errors['prenom'] = "Le prénom est requis.";
            }
            if (empty($tel)) {
                $errors['tel'] = "Le numéro de téléphone est requis.";
            } elseif (!preg_match("/^\d{10}$/", $tel)) {
                $errors['tel'] = "Le numéro de téléphone doit comporter 10 chiffres .";
            }
            if (empty($email)) {
                $errors['email'] = "L'email est requis.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "L'email n'est pas valide.";
            }

            if (empty($besoin)) {
                $errors['besoin'] = "Le besoin est requis.";
            }
            date_default_timezone_set('Europe/Paris'); // changer le fuseau horaire
            if (empty($errors)) {
                $requeteDev = $pdo->prepare("
                        INSERT INTO devis(nom, prenom, tel, email, id_Services, besoin,date_Devis) 
                        VALUES (:nom, :prenom, :telephone, :email, :id_Services, :besoin,:date_Devis)");
                $requeteDev->execute([
                    
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "telephone" => $telephone,
                        "email" => $email,
                        "id_Services" => $liste_Service,
                        "besoin" => $besoin,
                        "date_Devis" => date("Y-m-d H:i:s")  // changer le format de la datetime en francais

                    ]);
                    
                    // rediger l'utilisateur vers la page de success
                    header('Location: index.php?action=secDev');
                    exit;
            } else {

                $_SESSION['errors'] = $errors;
                
                // rediger l'utilisateur vers la page devis
                header('Location: index.php?action=devis');
                exit;
            }

        }
    }

    public function delDev($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDel = $pdo->prepare(
                "
                DELETE FROM devis 
                WHERE devis.id_Devis = :id"
            );
        $requeteDel->execute([
                "id" => $id
            ]);
            header("Location: index.php?action=admin");
        }
        //Page Avis 
        public function pageAvis()
        {
            require("view/addAvis.php");
                
        }
        public function secAvis()
    {
        require("view/secAvis.php");
    }
        //Ajouter un Avis
        public function addAvis(){
            $image = $_FILES['image']['name'];
            $pdo = Connect::seConnecter();
            if (isset($_POST['submit'])) {
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prenom = filter_input(INPUT_POST,"prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $commentaire = filter_input(INPUT_POST, "commentaire", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                // Validation
                $errors = [];
                if (empty($nom)) {
                    $errors['nom'] = "Le nom est requis.";
                }   
                if (empty($prenom)) {
                    $errors['prenom'] = "Le prénom est requis.";
                }
                if (empty($commentaire)) {
                    $errors['commentaire'] = "Le commentaire est requis.";
                }
                if (empty($note)) {
                    $errors['note'] = "La note est requise.";
                }
                if (empty($errors)) {
                    $uploadDirectory = __DIR__ . '/../public/image/';  //remplacer par le chemin absolu de votre dossier image

                    // tester l'existance de l'image
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
                    $requete = $pdo->prepare("
                            INSERT INTO avis (commentaire, note, id_Services, nom, prenom, email, tel, image)
                            VALUES (:commentaire, :note, :id_Services, :nom, :prenom, :email, :tel, :image)
                        ");
                        $requete->execute([
                            'commentaire' => $commentaire,
                            'note' => $note,
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'image' => $image
                        ]);
                    header('Location: index.php?action=secAvis');
                    exit;
                } else {
                    var_dump($errors);
                    die();
                    $_SESSION['errors'] = $errors;
                    header('Location: index.php?action=pageAvis');
                    exit;
            }
        }
    }
    
        public function delAv($id)
        {
            $pdo = Connect::seConnecter();
            $requeteDel = $pdo->prepare(
                    "
            DELETE FROM avis 
            WHERE devis.id_Avis = :id"
                );
            $requeteDel->execute([
                    "id" => $id
                ]);
            ?>
        
        <?php
            header("Location: index.php?action=admin");
        }
    }
