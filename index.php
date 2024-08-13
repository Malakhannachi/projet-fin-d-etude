<?php
use Controlleur\Controller;
use Controlleur\SecuritController;

spl_autoload_register(function ($class_name) {
    require $class_name.'.php';
});

$ctrFrm = new Controller();
$secuCtrl = new SecuritController();
$id = isset($_GET['id']) ? $_GET["id"] : null; 

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
        "admin":$ctrFrm->admin();
        break;
        case
        "addDevis":$ctrFrm->addDevis();
        break;
        case
        "delDev":$ctrFrm->delDev($id);
        break;
        case
        "avis":$ctrFrm->avis();
        break;
        case
        "contact":$ctrFrm->contact();   
        break;
       // case
       // "service":$ctrFrm->service();
       // break;
        case 'serviceDet': $ctrFrm->serviceDet($id);
        break;
           
      
        
        
        
       



        }
   

    }

