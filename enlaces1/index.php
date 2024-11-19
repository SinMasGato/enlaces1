<?php
require_once 'controllers/Router.php';
require_once 'config/config.php';
require_once 'models/EnlaceModel.php';
require_once 'controllers/EnlaceController.php';

$router = new Router();
$controller = new EnlaceController();

$router->get('', [$controller, 'index']);
$router->post('buscar', [$controller, 'buscar']);

$router->dispatch();