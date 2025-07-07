<?php

namespace app\controllers;

use Flight;
use app\models\PretModel;
class PretController
{
    public static function list()
    {
        $prets = PretModel::getAll();
        $data  = ["page" => "pret/list" , "prets" => $prets];
        Flight::render('template', $data);
    }
}