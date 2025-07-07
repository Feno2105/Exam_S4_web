<?php

namespace app\models;

use Exception;
use Flight;
use PDO;

class TrajectModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertTraject($donnee)
    {
        $sql = "INSERT INTO Trajets (point_depart , point_arrivee , type_trajet) VALUES(? , ? , ?)";
        try {
            $ex = $this->db->prepare($sql);
            $ex->execute($donnee);
        } catch (Exception $th) {
            echo "error: " . $th->getMessage();
        }
    }
}