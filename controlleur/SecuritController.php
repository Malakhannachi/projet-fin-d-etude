<?php
namespace Controlleur;
session_start();
use Model\Connect;
class SecuritController
{
    public function register() 
    {
        if (isset($_POST['submit']))
        {
            // var_dump("inside post");
            $pdo = Connect::seConnecter();
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mdp2 = filter_input(INPUT_POST, 'mdp2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $recaptchaResponse = filter_input(INPUT_POST, 'recaptcha-response', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //var_dump($pseudo, $email , $mdp , $mdp2);
            //die();
            //tester si le mot de passe doit avoir 12 caracteres, une majuscule, une minuscule et un chiffre avec expression regulliare 
            $errors = [];
            if (empty($pseudo)) {
                $errors['pseudo'] = "Le pseudo est requis.";
            }
            if (empty($email)) {
                $errors['email'] = "L'email est requis.";
            }
            if (empty($mdp)) {
                $errors['mdp'] = "Le mot de passe est requis.";
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $mdp)) {
                $errors['mdp'] = "*Le mot de passe doit avoir au moins 8 caractères, une majuscule, une minuscule et un chiffre.";
            }
            if (empty($mdp2)) {
                $errors['mdp2'] = "Le mot de passe de confirmation est requis.";
            } elseif ($mdp != $mdp2) {
                $errors['mdp2'] = "Les mots de passe ne correspondent pas.";
            }
            if (!isset($_POST['cgu'])) {
                $errors['cgu'] = "Vous devez accepter les Conditions Générales d'Utilisation pour continuer.";
            }
            if (empty($recaptchaResponse)) {
                $errors['recaptchaResponse'] = "Le Captcha est requis.";
            }
            
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LfXFk8qAAAAANV2uezoqs5X2csRpKl-B-7D0TBu&response={$recaptchaResponse}";

            // On vérifie si curl est installé
            if(function_exists('curl_version')){
                $curl = curl_init($url);       // curl utiluse url pour le requête
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_TIMEOUT, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($curl);

            }else{
                // On utilisera file_get_contents
                $response = file_get_contents($url);
            }

            // var_dump($response);
            // die();

            if(empty($response)){
                $errors['recaptchaResponse'] = 'Le captcha n\'est pas valide';
            }else{
                $data = json_decode($response);
            }

            if($data->success == false) {
                $errors['recaptchaResponse'] = 'Le captcha n\'est pas valide';
            }
            //  var_dump($recaptchaResponse);
            // die();
             // Si des erreurs existent, ne pas continuer
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('location: index.php?action=register');
                exit();
            }

            // On prépare l'URL
          
            
            if ( $pseudo  && $email && $mdp && $mdp2) 
            {
                //verifier si email existe
                $requete = $pdo -> prepare("
                SELECT * 
                FROM users 
                WHERE email = :email");
                $requete -> execute(['email' => $email]);
                $user = $requete->fetch();
                if ($user) 
                {
                    //redirection vers login
                    header('location: index.php?action=login');
                    exit();
                } else {
                    //verifier si mdp = mdp2
                    if  ($mdp == $mdp2)
                    {
                     //insertion d'utilisateur dans la bd   
                        $insert = $pdo -> prepare("
                        INSERT INTO users (pseudo, email, mdp)
                        VALUES (:pseudo, :email, :mdp)");
                        $insert -> execute([
                            'pseudo' => $pseudo,
                            'email' => $email,
                            'mdp' => password_hash($mdp, PASSWORD_DEFAULT)
                        ]);
                        header('location: index.php?action=login');
                        exit();
                    }else
                    {
                        
                        header('location: index.php?action=register');
                        exit();
                    }
                }
               

        
            }
        }
    require ("hash/register.php");
    }

    public function login() {
        if (isset($_POST ["submit"])) {
            $pdo = Connect::seConnecter();
            
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($email && $mdp) { 
            
                $requete = $pdo -> prepare("
                    SELECT * 
                    FROM users
                    WHERE email=:email");  
                    $requete ->execute(["email"=>$email]);
                    $user = $requete->fetch();
                    
                    if($user){  
                                               
                        $hash = $user["mdp"];  
                        
                        if(password_verify($mdp, $hash)){
                            
                            $_SESSION["user"] = $user;
                            //var_dump($_SESSION["user"]);
                            //die();
                            header("Location: index.php?action=accueil");
                            exit;
                        } 
                    }else{
                        header("Location: index.php?action=login");
                        exit;
                        echo "email ou mot de passe incorrect";
                    }  
                    }   
                }  
                require ("hash/login.php");  
            }     
            
    public function logout()
    {
        unset($_SESSION["user"]);
        header("location: index.php?action=login");
        exit;
       
      } 

}
