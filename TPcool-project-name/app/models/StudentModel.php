<?php

namespace app\models;

use Flight;
use PDO;

class StudentModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

	public  function getProduit() {
        $produit = ['nom' => 'iphone 15', 'prix'=> 1290];
        return $produit;
    }

	public  function test() {
        $stmt = $this->db->query("SELECT * FROM etudiant");
        return $stmt->fetchAll();
    }

    public function getEtudiantById($idEtudiant){
        $pstmt = $this->db->prepare("SELECT * FROM etudiant WHERE numero_etudiant=?");
        $pstmt->bindParam(1,$idEtudiant);
        $pstmt->execute();
        
        return $pstmt->fetch();
    }

    public function getUserNote($idEtudiant){
        $pstmt = $this->db->prepare("SELECT * FROM note WHERE numero_etudiant=?");
        $pstmt->bindParam(1,$idEtudiant);
        $pstmt->execute();

        return $pstmt->fetchAll();
    }
}