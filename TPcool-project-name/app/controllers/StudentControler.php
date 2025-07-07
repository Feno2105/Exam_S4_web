<?php

namespace app\controllers;

use app\models\StudentModel;
use Flight;

class StudentControler {

	public function __construct() {

	}

	public function homedb() {
        $studentModel = new StudentModel(Flight::db());
        $etudiant = $studentModel->test();        
        $data = ['etudiant'=>$etudiant];
        Flight::render('Student', $data);
    }

    public function userNote($id){
        $studentModel = new StudentModel(Flight::db());
        
        $notes = $studentModel->getUserNote($id);
        $etudiant = $studentModel->getEtudiantById($id);


        $data = ['notes'=>$notes,'etudiant'=>$etudiant];
        Flight::render('StudentNote',$data);
    }
}



