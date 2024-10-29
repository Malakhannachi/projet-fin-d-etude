<?php

namespace Controlleur;

use Model\Connect;
use PDO;

class DevisController
{
    public function devis()
    {
        $pdo = Connect::seConnecter();
        $requeteDev = $pdo->query("SELECT * FROM services");
        $services = $requeteDev->fetchAll(PDO::FETCH_ASSOC);

        require("view/demandeDev.php");
    }

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

    public function secDev()
    {
        require("view/secDev.php");
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


    public function delDev($id)
    {
        $pdo = Connect::seConnecter();
        $requeteDel = $pdo->prepare("DELETE FROM devis WHERE devis.id_Devis = :id");
        $requeteDel->execute(['id' => $id]);
        header("Location: index.php?action=admin");
    }
}
