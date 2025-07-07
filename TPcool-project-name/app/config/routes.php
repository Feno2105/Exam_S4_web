<?php
use app\controllers\PretController;
use flight\net\Router;
use flight\Engine;

// use Flight;

/**
 * @var Router $router
 * @var Engine $app
 */
$pret_controller = new PretController();

$router->get('/prets', [$pret_controller, 'list']);