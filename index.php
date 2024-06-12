<?php
use Controlleur\Controller;
use Controlleur\SecuritController;

spl_autoload_register(function ($class_name) {
    require $class_name.'.php';
});

$ctrFrm = new Controller();
$secuCtrl = new SecuritController();

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 
        "accueil":$ctrFrm->accueil(); 
    break;
        case
        "login":$secuCtrl->login();
        break;
        case
        "register":$secuCtrl->register();
        break;
        case
        "logout":$secuCtrl->logout();
        break;
        case
        "devis":$ctrFrm->devis();
        break;
        case
        "devis":$ctrFrm->listDevis();
        break;
        
        
       



        }
   

    }

