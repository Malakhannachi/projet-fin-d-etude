<?php

use Controlleur\AvisController;
use Controlleur\DevisController;
use Controlleur\ServiceController;
use Controlleur\SiteController;
use Controlleur\AdminController;
use Controlleur\Controller;
use Controlleur\SecuritController;

spl_autoload_register(function ($class_name) { //chargement des classes
    require $class_name.'.php';
});

$ctrFrm = new Controller();
$siteCtrl = new SiteController();
$avisCtrl = new AvisController();
$serviceCtrl = new ServiceController();
$devisCtrl = new DevisController();
$secuCtrl = new SecuritController();
$adminCtrl = new AdminController();
$id = isset($_GET['id']) ? $_GET["id"] : null; // scope variable avec condition ternaire

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 
        "accueil":$siteCtrl->accueil(); 
        break;
        case
        "addDevAcceuil":$devisCtrl->addDevAcceuil();
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
        "devis":$devisCtrl->devis();
        break;
        case
        "addDevis":$devisCtrl->addMyDevis();  //page devis
        break;      
        case
        "avis":$avisCtrl->avis();
        break;
        case
        "pageAvis":$avisCtrl->pageAvis();
        break;
        case
        "addAvis":$avisCtrl->addAvis();
        break;
        case 
        "secAvis":$avisCtrl->secAvis();
        break;
        case
        "contact":$siteCtrl->contact();   
        break;
        case
        "secDev":$devisCtrl->secDev();
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
        "serviceDet": $serviceCtrl->serviceDet($id);
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
        "sendDevis": $adminCtrl->sendDevis($id);
        break;
        case
        "cgu": $siteCtrl->cgu();
        break;
        case
        "cgv": $siteCtrl->cgv();
        break;
        case
        "profil": $adminCtrl->profil($id);
        break;
        default: $siteCtrl->accueil();
        break;
        

        
           
      
        
        
        
       



        }
   

    }

