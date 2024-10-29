<?php

namespace Controlleur;

use Model\Connect;
use Model\Service;
use PDO;

class ServiceController
{
    private $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new Service(Connect::seConnecter());
    }
    
    public function listServicesParCat()   
    {
        $cats = $this->serviceModel->getServicesByCategory();
        return $cats;
    }

    public function serviceDet($id)
    {
        $service = $this->serviceModel->getServiceDetails($id);

        if (!$service) {
            header("Location: /404"); 
            exit();
        }
        require("view/serviceDet.php");
    }
}
