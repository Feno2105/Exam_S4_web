<?php

namespace app\models;

use Flight;
use PDO;

class ModelModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
}
