<?php

namespace app\controllers;

use app\models\LoginModel;
use app\models\TrajectModel;
use Flight;

class LoginController
{
    public function __construct()
    {
    }
    public function insertion_donnee()
    {
    }
    public function loginTemplate()
    {
        $data = ['page' => "login"];
        Flight::render('template1', $data);
    }
    public function loginValidation()
    {
        $donnee = array();
        $donnee[0] = $_POST['nom'];
        $donnee[1] = $_POST['password'];

        if ($donnee[0] == null || $donnee[1] == null) {
            Flight::render('login');
        } else {
            $loginModel = new LoginModel(Flight::db());

            if ($loginModel->loginValidation($donnee)) {
                $welcome_constroller = new WelcomeController();
                $welcome_constroller->welcomeTemplate();
            } else {
                echo "erreur : login incorrect";
            }
        }
    }
    public function inscriptionTemplate()
    {
        $categorieController = new CategorieController();
        $categorie = $categorieController->selectAll();

        // Ajout des catégories au tableau des données
        $data = [
            'page' => "inscription", // Indique à template1 d'inclure inscription.php
            'categorie' => $categorie // Transmet les catégories au template inscription
        ];
        // Rendu du template principal avec les données
        Flight::render('template1', $data);
    }

    public function insertInscription()
    {
        $donnees = array();
        $donnees[0] = $_POST["name"];
        $donnees[1] = $_POST["id_cat"];
        $donnees[2] = $_POST["password"];

        $confirm_password = $_POST["confirm_password"];

        if ($donnees[0] == null || $donnees[1] == null || $confirm_password == null) {
            echo "Formulaire non complet";
        } else {
            if ($donnees[2] == $confirm_password) {
                echo "en peut tout inserer";
                $loginModel = new LoginModel(Flight::db());
                $loginModel->insertInscription($donnees);
                if ($loginModel) {
                    Flight::redirect('/login');
                } else {
                    echo "Inscription incorrect";
                }
            } else {
                echo "Mot de pass non confirmer";
            }
        }
    }
}
