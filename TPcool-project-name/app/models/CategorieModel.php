<?php

namespace app\models;

use Flight;
use PDO;

class CategorieModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function selectAll()
    {
        $sql = "select * from categorie";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
}
