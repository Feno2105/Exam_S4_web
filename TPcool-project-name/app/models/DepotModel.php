<?php

namespace app\models;

use Flight;
use PDO;

class DepotModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function getSumDepot()
    {
        session_start();
        $donnee = array();
        $donnee[0] = $_SESSION['id_utilisateur'];
        $donnee[1] = 'true';

        $sql = "select SUM(montant) AS sum_montant from depot WHERE utilisateur_id=? AND validation LIKE ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute($donnee);

        return $pstmt->fetch();
    }
    public function validationDepot($id_dep)
    {
        $donnees = array();
        $donnees[0] = 'true';
        $donnees[1] = $id_dep;
        $sql = "UPDATE depot SET validation = ? WHERE id = ?";
        try {
            $ex = $this->db->prepare($sql);
            $ex->execute($donnees);
            return true;
        } catch (\Throwable $th) {
            echo "error: " . $th->getMessage();
        }
        return false;
    }
    public function listeDepotNonValide()
    {
        $sql = "SELECT * FROM depot where validation LIKE 'false'";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();

        return $pstmt->fetchAll();
    }
    public function getMyList()
    {
        $donnee = array();
        $donnee[0] = $_SESSION['id_utilisateur'];
        $sql = "select * from depot where utilisateur_id=?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute($donnee);

        return $pstmt->fetchAll();
    }
    public function insertDepot($donnees)
    {
        $sql = "INSERT INTO depot (montant, utilisateur_id , date_depot , validation) VALUES (? , ? , ? , ?)";
        try {
            $ex = $this->db->prepare($sql);
            $ex->execute($donnees);
            return true;
        } catch (\Throwable $th) {
            echo "error: " . $th->getMessage();
        }
        return false;
    }
    public function getTime()
    {
        $sql = "SELECT NOW() AS now";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();

        return $pstmt->fetch();
    }
}
