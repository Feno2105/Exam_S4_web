<?php
/*
public function insertion($id_chauffeur, $id_vehicule, $id_trajet, $date_depart, $date_arrivee)
    {
        $donnee = array();
        $donnee[0] = $id_chauffeur;
        $donnee[1] = $id_vehicule;
        $donnee[2] = $id_trajet;
        $donnee[3] = $date_depart;
        $donnee[4] = $date_arrivee;

        $trajectModel = new TrajectModel(Flight::db());
        $trajectModel->insertTraject($donnee);
    }

*/
namespace app\controllers;

use app\models\AffectationModel;
use Flight;

class AffectationController
{

    public function __construct()
    {

    }
    public function getVehiculeDispo($date)
    {
        $donnee = array();
        $donnee[0] = $date;
        $donnee[1] = $date;
        $donnee[2] = $date;

        $affectation = new AffectationModel(Flight::db());
        $vehicule_dispo = $affectation->getVehiculeDispo($donnee);

        $data = ['vehicule_dispo' => $vehicule_dispo];
        Flight::render('Test', $data);

    }
    public function moreRentable()
    {
        $affectation = new AffectationModel(Flight::db());
        $more_rentable = $affectation->getMoreRentable();
        $data = ['more_rentable' => $more_rentable];
        Flight::render('Test', $data);
    }

    public function insertion_donnee()
    {

    }

}