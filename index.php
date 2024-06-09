<?php
use Controlleur\Controller;


spl_autoload_register(function ($class_name) {
    require $class_name.'.php';
});


$ctrFrm = new Controller();
$id = isset($_GET['id']) ? $_GET["id"] : null;



if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 
            "register":$secuCtrl->register(); 
        break;
        
       



        }
   

    }

