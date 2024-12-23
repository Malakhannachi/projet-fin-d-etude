<?php

namespace Controlleur;

use Model\Connect;
use PDO;

class Controller
{
    public function listServicesParCat()   // afficher le navigateur des services par categorie
    {
        $pdo = Connect ::seConnecter();
        $requete = $pdo->prepare("
            SELECT *    
            FROM cat   
            INNER JOIN services ON cat.id_Cat = services.id_Cat
        ");
        $requete->execute();
        $results = $requete->fetchAll(PDO::FETCH_ASSOC);


        // var_dump($results);
        
        $cats = [];  // tableau vide pour remplir le navigateur
        foreach ($results as $row) {
            $cats[$row['id_Cat']]['nom_Cat'] = $row['nom_Cat']; // remplir tableau par les categories 
            $cats[$row['id_Cat']]['services'][] = [
                'id_Services' => $row['id_Services'], // [] pour ajouter des services suite à base de l'id
                'nom_Ser' => $row['nom_Ser'],
            ];
        }
        //var_dump($cats[1]);
        //die();
        return $cats;
    }
    public function accueil()
    {
        //section des services

        $pdo = Connect::seConnecter();
        //afficher liste dynamique des services
        $requete = $pdo->query("
            SELECT * 
            FROM services limit 3
        ");
        $services = $requete->fetchAll(PDO::FETCH_ASSOC);
        //section des avis
        $requete = $pdo->query("
            SELECT * 
            FROM avis 
            Inner JOIN users ON avis.id_User = users.id_User
            limit 3
        ");
        $avis = $requete->fetchAll(PDO::FETCH_ASSOC); 
        // section devis
        // obtenir tous les services 
        $requeteDev = $pdo->query("
            SELECT *
            FROM services ");
        $requeteDev->execute();
        $serDev = $requeteDev->fetchAll(PDO::FETCH_ASSOC);
        require("view/accueil.php");
        
    }
    public function addDevAcceuil()
    {
        $pdo = Connect::seConnecter();
        if (isset($_POST['submit'])) {
            // var_dump("inside addDevAcceuil");
            // die();
            $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);  // filtrer codes malveillants
            $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $tel = filter_input(INPUT_POST, "tel", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
            $dateDuJour = date("Y-m-d H:i:s");
            
            if (empty($errors)) {
                $requeteDev = $pdo->prepare("
                        INSERT INTO demande_devis(nom, prenom, tel, email, id_Services, besoin,date_Dem, id_User) 
                        VALUES (:nom, :prenom, :telephone, :email, :id_Services, :besoin,:date_Dem, :id_User)");
                $requeteDev->execute([
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "telephone" => $tel,
                        "email" => $email,
                        "id_Services" => $liste_Service,
                        "besoin" => $besoin,
                        "date_Dem" => $dateDuJour,  // changer le format de la datetime en francais
                        "id_User" => isset($_SESSION['user']) ? $_SESSION['user']['id_User'] : null,
                    ]);
                    
                    // rediger l'utilisateur vers la page de success
                    header('Location: index.php?action=secDev');
                    exit;
            } else {

                $_SESSION['errors'] = $errors;
                
                // rediger l'utilisateur vers la page devis
                header('Location: index.php?action=accueil#devis');
                exit;
            }

        }
    }

    //page Devis
    public function devis()
    {
        $pdo = Connect::seConnecter();
        //afficher liste dynamique des services
        $requeteDev = $pdo->query("
        SELECT *
        FROM services ");
        $requeteDev->execute();
        $services = $requeteDev->fetchAll(PDO::FETCH_ASSOC);
        
        require("view/demandeDev.php");
    }

    //Page Avis
    public function avis()
    {
        $pdo = Connect::seConnecter();
         // calculer le nombre total d'avis
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // page courante
        $avisPerPage = 6; // 6 aviss par page
        $offset = ($page - 1) * $avisPerPage; // offset pour commencer à partir de la page courante

        // faire une requete pour compter le nombre d'avis
        $totalAvisQuery = $pdo->query("SELECT COUNT(*) as count FROM avis");
        $totalAvis = $totalAvisQuery->fetch(PDO::FETCH_ASSOC)['count'];

        // calculer le nombre total de pages
        $totalPages = ceil($totalAvis / $avisPerPage);

        // faire une requete pour recuperer les avis
        $requete = $pdo->prepare("SELECT * 
        FROM avis
        Inner JOIN users ON avis.id_User = users.id_User 
        LIMIT :lim OFFSET :offs");
        // bindvalue est une fonction qui permet de lier une variable a une requete 
        $requete->bindValue(':lim', $avisPerPage, PDO::PARAM_INT); 
        $requete->bindValue(':offs', $offset, PDO::PARAM_INT);
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
        $requete = $pdo->prepare
        ("
        SELECT * FROM services 
        WHERE id_Services = :id"
        );
        $requete->bindValue(':id', $id, PDO::PARAM_INT); 
        $requete->execute();
        $service = $requete->fetch(PDO::FETCH_ASSOC); // fetch 

        // var_dump($service);

        if (!$service) {
            header("Location: /404"); // rediriger l'utilisateur vers la page 404
            exit();
        }

        require("view/serviceDet.php");
    }
    
    //page pour afficher un msg de succées 
    public function secDev()
    {
        // var_dump('inside secDev');
        // die();
        
        require("view/secDev.php");
    }
    
    //page condition génrale d'utilistation cgu  
    public function cgu(){
        require("view/cgu.php");
    }

    //page condition genrale de vente cgv
    public function cgv(){
        require("view/cgv.php");
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
            $ville = filter_input(INPUT_POST, "ville", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $codePostal = filter_input(INPUT_POST, "codePostal", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $adresse = filter_input(INPUT_POST, "adresse", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $liste_Service = filter_input(INPUT_POST, "liste_Service", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $besoin = filter_input(INPUT_POST, "besoin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $errors = []; // declarer le tableau d'erreurs
            // Validation
            if (empty($nom)) {
                $errors['nom'] = "Le nom est requis.";
            }
            if (empty($prenom)) {
                $errors['prenom'] = "Le prénom est requis.";
            }
            if (empty($telephone)) {
                $errors['tel'] = "Le numéro de téléphone est requis.";
            } elseif (!preg_match("/^\d{10}$/", $telephone)) {
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
                        INSERT INTO demande_devis(nom, prenom, tel, email, ville, codePostal, adresse, id_Services, besoin,date_Dem, id_User) 
                        VALUES (:nom, :prenom, :telephone, :email, :ville, :codePostal, :adresse, :id_Services, :besoin,:date_Devis, :id_User)");
                $requeteDev->execute([  
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "telephone" => $telephone,
                        "email" => $email,
                        "ville" => $ville,
                        "codePostal" => $codePostal,
                        "adresse" => $adresse,
                        "id_Services" => $liste_Service,
                        "besoin" => $besoin,
                        "date_Devis" => date("Y-m-d H:i:s"),  // changer le format de la datetime en francais
                        "id_User"=> isset($_SESSION['user']) ? $_SESSION['user']['id_User']: null, // ternary operator (remplace IF ? ELSE :)
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
