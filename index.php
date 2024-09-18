<?php

use Controlleur\AdminController;
use Controlleur\Controller;
use Controlleur\SecuritController;

spl_autoload_register(function ($class_name) { //chargement des classes
    require $class_name.'.php';
});

$ctrFrm = new Controller();
$secuCtrl = new SecuritController();
$adminCtrl = new AdminController();
$id = isset($_GET['id']) ? $_GET["id"] : null; 

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 
        "accueil":$ctrFrm->accueil(); 
        break;
        case
        "addDevAcceuil":$ctrFrm->addDevAcceuil();
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
        "addDevis":$ctrFrm->addMyDevis();  //page devis
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
        break;
        case
        "listDemandeDevis": $adminCtrl->listDemandeDevis();
        break;
        case
        "listDev": $adminCtrl->listDev();
        break;
        case
        "pageOffre": $adminCtrl->pageOffre($id);
        break;
        case
        "imprimDevis": $adminCtrl->imprimDevis($id);
        break;
        case
        "editDevis": $adminCtrl->editDevis($id);
        break;
        case
        "deleteDevis": $adminCtrl->deleteDevis($id);
        break;
        case
        "listAvis": $adminCtrl->listAvis();
        break;
        case
        "deleteAvis": $adminCtrl->deleteAvis($id);
        break;
        case
        "editAvis": $adminCtrl->editAvis($id);
        break;
        case
        "serviceDet": $ctrFrm->serviceDet($id);
        break;
        case 
        "listService": $adminCtrl->listService();
        break;
        case
        'editServices': $adminCtrl->editServices($id);
        break;
        case
        "addService": $adminCtrl->addService();
        break;
        case
        "deleteService": $adminCtrl->deleteService($id);
        break;
        case
        "traitmentDevis": $adminCtrl->traitmentDevis($id);
        break;
        case
        "cgu": $ctrFrm->cgu();
        break;
        case
        "cgv": $ctrFrm->cgv();
        break;
        default: $ctrFrm->accueil();
        break;
        

        
           
      
        
        
        
       



        }
   

    }

