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
            $pdo = Connect::seConnecter();
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mdp2 = filter_input(INPUT_POST, 'mdp2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($nom && $prenom && $email && $mdp && $mdp2) 
            {
                $requete = $pdo -> prepare("
                SELECT * FROM users 
                WHERE email = :email");
                $requete -> execute(['email' => $email]);
                $user = $requete -> fetch();
                if ($user) 
                {
                    header('location: index.php?action=login');
                    exit();
                }else
                {
                    if ($mdp == $mdp2) 
                    {
                        
                        $insert = $pdo -> prepare("
                        INSERT INTO users (nom, prenom, email, mdp)
                        VALUES (:nom, :prenom, :email, :mdp)");
                        $insert -> execute([
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'email' => $email,
                            'mdp' => password_hash($mdp, PASSWORD_DEFAULT)
                        ]);
               

        
            }
        }
    require ("view/register.php");
    }

}
    }
}
