<?php

namespace app\controllers;


use app\models\CadeauModel;
use app\models\DepotModel;
use Flight;

class CadeauController
{

    public function __construct()
    {
    }
    public function validatationCadeau()
    {
        $cadeau_model = new CadeauModel(Flight::db());
        $depot_model = new DepotModel(Flight::db());
        $argent = $depot_model->getSumDepot()["sum_montant"];
        echo "votre argent est de : " . $argent;
        echo "<br>La somme est de : " . $_SESSION['somme'];
        if ($argent < $_SESSION["somme"]) {
            echo "votre argent est trop petit";
        } else {
            for ($i = 0; $i < count($_SESSION['listeCadeau']); $i++) {
                $donnee = array();
                $donnee[0] = $_SESSION['id_utilisateur'];
                $donnee[1] = $_SESSION['listeCadeau'][$i][""];
            }
        }
    }
    public function modifier($i)
    {
        session_start();
        $compteur = 0;
        echo "modifier le cadeau numero : " . $i;


        for ($index = 0; $index < count($_SESSION['id_cadeau_fille']); $index++) {
            if ($i == $compteur) {

                echo "index : " . $index . " de fille";
                echo "<br>";
                echo "generer un nouveau cadeau entre : 0 et " . count($_SESSION["all_id_cadeaux_fille"]);
                echo "<br>";
                $nouvelleIdCadeau = rand(0, count($_SESSION["all_id_cadeaux_fille"]));
                $_SESSION['id_cadeau_fille'][$index][0] = $_SESSION["all_id_cadeaux_fille"][$nouvelleIdCadeau][0];
                echo "nouvelle id vadeau : " . $nouvelleIdCadeau;
            }
            $compteur++;
        }
        for ($index = 0; $index < count($_SESSION['id_cadeau_garcon']); $index++) {
            if ($i == $compteur) {

                echo "index : " . $index . " de fille";
                echo "<br>";
                echo "generer un nouveau cadeau entre : 0 et " . count($_SESSION["all_id_cadeaux_garcon"]);
                echo "<br>";
                $nouvelleIdCadeau = rand(0, count($_SESSION["all_id_cadeaux_garcon"]));
                $_SESSION['id_cadeau_garcon'][$index][0] = $_SESSION["all_id_cadeaux_garcon"][$nouvelleIdCadeau][0];
                echo "nouvelle id vadeau : " . $nouvelleIdCadeau;
            }
            $compteur++;
        }



        $listeCadeau = $this->afficheCadeau();

        $sommeArgent = 0;

        for ($i = 0; $i < count($listeCadeau); $i++) {
            $sommeArgent += $listeCadeau[$i]["prix"];
        }
        $_SESSION['somme'] = $sommeArgent;
        $data = ['page' => "listCadeau", 'listeCadeau' => $listeCadeau, 'somme' => $sommeArgent];
        Flight::render('template2', $data);
    }
    public function afficheCadeau()
    {
        $cadeauModel = new CadeauModel(Flight::db());

        $listCadeau = array();
        $compteur = 0;
        for ($i = 0; $i < count($_SESSION['id_cadeau_fille']); $i++) {
            $listCadeau[$compteur] = $cadeauModel->selectById($_SESSION['id_cadeau_fille'][$i][0]);
            $compteur++;
        }
        for ($i = 0; $i < count($_SESSION['id_cadeau_garcon']); $i++) {
            $listCadeau[$compteur] = $cadeauModel->selectById($_SESSION['id_cadeau_garcon'][$i][0]);
            $compteur++;
        }
        $_SESSION['listCadeau'] = $listCadeau;
        return $listCadeau;
    }

    public function generationGadeau()
    {
        session_start();
        $cadeauModel = new CadeauModel(Flight::db());
        $nombreFille = $_POST['nbf'];
        $nombreGarcon = $_POST['nbg'];
        if ($nombreFille == null && $nombreGarcon == null) {
            echo "veillez completer les donnees";
        } else {
            if ($nombreFille == null) {
                $nombreFille = 0;
            }
            if ($nombreGarcon == null) {
                $nombreGarcon = 0;
            }
            echo "nombre de fille : " . $nombreFille;
            echo "<br>nombre de garcon : " . $nombreGarcon;

            $nombreCadeaux = $cadeauModel->nombreCadeau()['nbCadeaux'];

            echo 'nombre cadeau : ' . $nombreCadeaux;

            $id_cadeaux_fille = $cadeauModel->selectIdBySexe(1);
            $_SESSION["all_id_cadeaux_fille"] = $id_cadeaux_fille;
            //$_SESSION["nombreIdCadeauFille"] = count($id_cadeaux_fille); // nombre fotsiny

            $id_cadeaux_garcon = $cadeauModel->selectIdBySexe(2);
            $_SESSION["all_id_cadeaux_garcon"] = $id_cadeaux_garcon;
            //$_SESSION["nombreIdCadeauGarcon"] = count($id_cadeaux_fille);

            $id_cadeaux_fille = $this->melangerTableauAvecLimite($id_cadeaux_fille, $nombreFille);
            $id_cadeaux_garcon = $this->melangerTableauAvecLimite($id_cadeaux_garcon, $nombreGarcon);

            $_SESSION['id_cadeau_fille'] = $id_cadeaux_fille;
            $_SESSION['id_cadeau_garcon'] = $id_cadeaux_garcon;
            $_SESSION['somme'] = 0;
            $listeCadeau = $this->afficheCadeau();


            $sommeArgent = 0;

            for ($i = 0; $i < count($listeCadeau); $i++) {
                $sommeArgent += $listeCadeau[$i]["prix"];
            }
            $_SESSION['somme'] = $sommeArgent;
            $data = ['page' => "listCadeau", 'listeCadeau' => $listeCadeau, 'somme' => $sommeArgent];
            Flight::render('template2', $data);
        }
    }
    function melangerTableauAvecLimite($tableau, $limite)
    {
        $taille = count($tableau);



        // Mélange le tableau avec l'algorithme Fisher-Yates
        for ($i = $taille - 1; $i > 0; $i--) {
            $j = rand(0, $i);
            $temp = $tableau[$i];
            $tableau[$i] = $tableau[$j];
            $tableau[$j] = $temp;
        }

        // Retourne les $limite premiers éléments du tableau mélangé
        return array_slice($tableau, 0, $limite);
    }

    public function formulaireTemplate()
    {
        $data = ['page' => "cadeau"];
        Flight::render('template2', $data);
    }
}
