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

use app\models\CategorieModel;
use Flight;

class CategorieController
{

    public function __construct() {}
    public function selectAll()
    {
        $categorieModel = new CategorieModel(Flight::db());
        $categorie = $categorieModel->selectAll();
        return $categorie;
    }
}
