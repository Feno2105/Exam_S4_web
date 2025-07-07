<?php

namespace app\models;

use Flight;
use PDO;

class CadeauModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function enregistrementValidationCadeau($donnee)
    {
        $sql = "INSERT INTO validationCadeau (utilisateur_id, id_cadeau) VALUES (? , ?)";
        try {
            $ex = $this->db->prepare($sql);
            $ex->execute($donnee);
            return true;
        } catch (\Throwable $th) {
            echo "error: " . $th->getMessage();
        }
        return false;
    }
    public function selectIdBySexe($id_cat)
    {
        $donnee = array();
        $donnee[0] = $id_cat;
        $donnee[1] = 3;
        $sql = "SELECT id FROM cadeaux where categorie_id = ? OR categorie_id = ?";

        $pstmt = $this->db->prepare($sql);
        $pstmt->execute($donnee);
        return $pstmt->fetchAll();
    }
    public function selectById($id_c)
    {
        $donnee = array();
        $donnee[0] = $id_c;
        $sql = "SELECT * FROM cadeaux where id = ?";

        $pstmt = $this->db->prepare($sql);
        $pstmt->execute($donnee);

        return $pstmt->fetch();
    }
    public function selectAll()
    {
        $sql = "SELECT * FROM cadeaux";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    public function nombreCadeau()
    {
        $sql = "SELECT COUNT(id) AS nbCadeaux FROM cadeaux";
        $stmt = $this->db->query($sql);
        return $stmt->fetch();
    }
}
