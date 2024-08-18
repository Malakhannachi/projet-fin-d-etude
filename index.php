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
        "admin":$ctrFrm->admin();
        break;
        case
        "devis":$ctrFrm->devis();
        break;
        case
        "addDevis":$ctrFrm->addMyDevis();  //page devis
        break;
        case
        "delDev":$ctrFrm->delDev($id);
        break;
        case
        "avis":$ctrFrm->avis();
        break;
        case
        "pageAvis":$ctrFrm->pageAvis();
        break;
        case
        "addAvis":$ctrFrm->addAvis();
        break;
        case 
        "secAvis":$ctrFrm->secAvis();
        break;
        case
        "contact":$ctrFrm->contact();   
        break;
        case
        "secDev":$ctrFrm->secDev();
       // case
       // "service":$ctrFrm->service();
       // break;
        case 'serviceDet': $ctrFrm->serviceDet($id);
        break;
           
      
        
        
        
       



        }
   

    }

