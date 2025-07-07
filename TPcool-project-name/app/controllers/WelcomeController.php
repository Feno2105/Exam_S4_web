<?php

namespace app\controllers;

use app\models\CategorieModel;
use Flight;

class WelcomeController
{

    public function __construct() {}

    public function welcomeTemplate()
    {
        $data = ['page' => "welcome"];
        Flight::render('template2', $data);
    }
}
