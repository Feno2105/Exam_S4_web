<?php
namespace app\models;

use Flight;

class PretModel
{
    public static function getAll()
    {
        $stmt = Flight::db()->query('SELECT * FROM view_pret');
        return $stmt->fetchAll();
    }
}
