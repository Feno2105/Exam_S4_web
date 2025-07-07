<?php

namespace app\controllers;

use app\controllers\admin\WelcomeAdminController;
use app\models\DepotModel;
use Flight;

class DepotController
{

    public function __construct() {}
    public function validationDepot($id_depot)
    {
        $welcom_controller = new WelcomeAdminController();
        echo "validation du depot : " . $id_depot;
        $depotModel = new DepotModel(Flight::db());
        if ($depotModel->validationDepot($id_depot)) {
            $welcom_controller->template();
        }
    }
    public function listeDepotNonValide()
    {
        $depotModel = new DepotModel(Flight::db());
        $listDepot = $depotModel->listeDepotNonValide();

        return $listDepot;
    }
    public function depotTemplate()
    {
        $data = ['page' => "depot"];
        Flight::render('template2', $data);
    }
    public function listDepot()
    {
        session_start();
        $depotModel = new DepotModel(Flight::db());
        $listDepot = $depotModel->getMyList();

        $data = ['listDepot' => $listDepot, 'page' => 'depotInfo'];
        Flight::render('template2', $data);
    }
    public function insert()
    {
        session_start();
        $depotModel = new DepotModel(Flight::db());

        $donnee = array();
        $donnee[0] = $_POST['montant'];
        $donnee[1] = $_SESSION['id_utilisateur'];
        $donnee[2] = $depotModel->getTime()['now'];
        echo $donnee[2];
        $donnee[3] = 'false';

        if ($donnee[0] == null) {
            echo "veillez completer les donees";
        } else {
            if ($depotModel->insertDepot($donnee)) {
                $welcome_constroller = new WelcomeController();
                $welcome_constroller->welcomeTemplate();
            } else {
                echo "non inserer";
            }
        }
    }
}
