<?php

use app\controllers\AffectationController;
use app\controllers\ApiExampleController;
use app\controllers\CadeauController;
use app\controllers\DepotController;
use app\controllers\LoginController;
use app\controllers\StudentControler;
use app\controllers\TrajectController;
use app\controllers\WelcomeController;
use app\controllers\admin\WelcomeAdminController;
use flight\Engine;
use flight\net\Router;

//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
$login_controller = new LoginController();
$welcome_constroller = new WelcomeController();
$depot_controller = new DepotController();
$cadeau_controller = new CadeauController();

// LOGIN ET INSCRIPTION
$router->get('/', [$login_controller, 'loginTemplate']);
$router->get('/login', [$login_controller, 'loginTemplate']);
$router->get('/inscription', [$login_controller, 'inscriptionTemplate']);
$router->post('/insertion_inscription', [$login_controller, 'insertInscription']);
$router->post('/validation_login', [$login_controller, 'loginValidation']);

// WELCOME / PAGE D ACCEUIL LOGEUR
$router->get('/welcome', [$welcome_constroller, 'welcomeTemplate']);

// DEPOT DU LOGEUR
$router->get('/depot', [$depot_controller, 'depotTemplate']);
$router->post('/insert_depot', [$depot_controller, 'insert']);
$router->get('/list', [$depot_controller, 'listDepot']);

// CADEAU
$router->get('/cadeau', [$cadeau_controller, 'formulaireTemplate']);
$router->post('/generationCadeau', [$cadeau_controller, 'generationGadeau']);
$router->get('/modifieCadeau/@id:[0-9]+', [$cadeau_controller, 'modifier']);
$router->get("/validatationCadeau", [$cadeau_controller, 'validatationCadeau']);
/*$router->get('/', function() use ($app) {
 $student_controler = new WelcomeController($app);
 $app->render('welcome', [ 'message' => 'It works!!' ]);
});*/
/*
$student_controler = new StudentControler();
$router->get('/', function () {
	$controler = new StudentControler();
	$controler->homedb();
}); /*


/*
$router->get('/note/@id',function($id){
	$controler = new StudentControler();
	$controler->userNote($id);
});


$router->group('/api', function() use ($router, $app) {
	$Api_Example_Controller = new ApiExampleController($app);
	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
});
*/
$router->group('/admin', function () use ($router) {
	$welcomeAdmin_controller = new WelcomeAdminController();
	$depot_controller = new DepotController();
	$router->get('/', [$welcomeAdmin_controller, 'template']);
	$router->get('/validationDepot/@id_depot:[0-9]+', [$depot_controller, 'validationDepot']);
});
