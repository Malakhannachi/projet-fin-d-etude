<?php
use Controlleur\Controller;

spl_autoload_register(function ($class_name) {
    require $class_name.'.php';
});

$ctrFrm = new Controller();
$secuCtrl = new SecuriteController();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 
        "accueil":$ctrFrm->accueil(); 
    break;
        case
        "login":$secuCtrl->login();
        break;
        "register":$secuCtrl->register(); 
        break;
        "logout":$secuCtrl->logout();
          break;
        
       



        }
   

    }

