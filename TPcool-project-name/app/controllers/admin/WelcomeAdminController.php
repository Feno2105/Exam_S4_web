<?php

namespace app\controllers\admin;


use Flight;
use app\controllers\DepotController;

class WelcomeAdminController
{

    public function __construct() {}
    public function template()
    {
        $depot_controller = new DepotController();
        $listeDepot = $depot_controller->listeDepotNonValide();
        $data = ['page' => "welcomeAdmin", 'listeDepot' => $listeDepot];
        Flight::render('admin/template1', $data);
    }
}
