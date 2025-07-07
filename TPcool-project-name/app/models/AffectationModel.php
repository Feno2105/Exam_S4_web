<?php
/* 
    public function insertAffectation($donnee)
    {
        $sql = "INSERT INTO Affectations (id_chauffeur , id_vehicule , id_trajet , date_depart , date_arrivee) VALUES(? , ? , ? , ? , ?)";
        try {
            $ex = $this->db->prepare($sql);
            $ex->execute($donnee);
        } catch (Exception $th) {
            echo "error: " . $th->getMessage();
        }
    }
*/

namespace app\models;

use Exception;
use Flight;
use PDO;

class AffectationModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getVehiculeDispo($donnee)
    {
        $pstmt = $this->db->prepare("SELECT * FROM Affectations af WHERE af.id_vehicule NOT IN (SELECT a.id_vehicule  FROM Affectations a WHERE a.date_arrivee = ?) AND af.id_vehicule NOT IN(SELECT p.id_vehicule FROM Pannes p  WHERE p.debut_panne>=? AND p.fin_panne<=?) GROUP BY af.id_vehicule");
        $pstmt->execute($donnee);

        return $pstmt->fetchAll();
    }
    public function getMoreRentable()
    {
        $pstmt = $this->db->prepare("SELECT a.date_depart AS date, t.point_depart, t.point_arrivee, (a.montant_recette - a.montant_carburant) AS benefice FROM Affectations a JOIN Trajets t ON a.id_trajet = t.id WHERE (a.montant_recette - a.montant_carburant) = (SELECT MAX(a2.montant_recette - a2.montant_carburant) FROM Affectations a2 WHERE a2.date_depart = a.date_depart) GROUP BY a.date_depart");
        $pstmt->execute();

        return $pstmt->fetchAll();
    }
    public function insertAffectation($donnee)
    {

    }
}