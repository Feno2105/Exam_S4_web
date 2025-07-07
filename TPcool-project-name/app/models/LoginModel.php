<?php

namespace app\models;

use Flight;
use PDO;

class LoginModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function loginValidation($donnee)
    {
        $sql = "SELECT * FROM utilisateur where nom = ? and password = ?";
        echo "<pre>";
        echo print_r($donnee);
        echo "</pre>";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute($donnee);

            $result_select = $pstmt->fetchAll();
            if (count($result_select) == 1) {
                session_start();
                $_SESSION['id_utilisateur'] = $result_select[0]["id"];
                return true;
            }
        } catch (\Throwable $th) {
            echo "erreur : " . $th->getMessage();
        }
        return false;
    }

    public function insertInscription($donnees)
    {
        if ($this->verificationInscription($donnees)) {
            echo "Cette utilisateur existe deja";
        } else {
            $sql = "INSERT INTO utilisateur (nom , categorie_id , password ) VALUES (? , ? , ?)";
            try {
                $ex = $this->db->prepare($sql);
                $ex->execute($donnees);
                return true;
            } catch (\Throwable $th) {
                echo "error: " . $th->getMessage();
            }
        }
        return false;
    }
    public function verificationInscription($donnees)
    {
        $sql = "SELECT * FROM utilisateur WHERE nom = ? AND categorie_id = ? AND password = ?";
        try {
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute($donnees);

            $resultat = $pstmt->fetchAll();
            print_r($resultat);
            echo "taille : " . count($resultat);
            if (count($resultat) > 1) {
                return true; // efa misy
            }
        } catch (\Throwable $th) {
            echo "error: " . $th->getMessage();
        }
        return false;
    }
}
