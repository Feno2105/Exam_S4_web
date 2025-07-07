<?php

namespace app\controllers;

use app\models\TrajectModel;
use Flight;

class TrajectController
{
    public function __construct()
    {

    }
    public function insertion_donnee()
    {

        $donnees = array();
        $donnees[0] = $_POST["pDepart"];
        $donnees[1] = $_POST["pArriver"];


        if ($_POST["pDepart"] == null || $_POST["pArriver"] == null || !isset($_POST["type_trajet"])) {
            echo "formulaire non complet";
        } else {
            $donnees[2] = $_POST["type_trajet"];
            echo "formulaire complet";
            $trajectModel = new TrajectModel(Flight::db());
            $trajectModel->insertTraject($donnees);

            Flight::render('formulaire_traject');
        }
    }
    public function formulaire_insertion()
    {
        Flight::render('formulaire_traject');
    }

}