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
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mdp2 = filter_input(INPUT_POST, 'mdp2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // var_dump($nom , $prenom , $email , $mdp , $mdp2);
            // die();
            
            if ($nom && $prenom && $email && $mdp && $mdp2) 
            {
                //verifier si email existe
                $requete = $pdo -> prepare("
                SELECT * 
                FROM users 
                WHERE email = :email");
                $requete -> execute(['email' => $email]);
                $user = $requete -> fetch();
                if ($user) 
                {
                    //redirection vers login
                    header('location: index.php?action=login');
                    exit();
                } else {
                    //verifier si mdp = mdp2
                    if ($mdp == $mdp2) 
                    {
                     //insertion d'utilisateur dans la bd   
                        $insert = $pdo -> prepare("
                        INSERT INTO users (nom, prenom, email, mdp)
                        VALUES (:nom, :prenom, :email, :mdp)");
                        $insert -> execute([
                            'nom' => $nom,
                            'prenom' => $prenom,
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
