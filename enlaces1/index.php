<?php
require_once 'config/config.php';
require_once 'models/EnlaceModel.php';
require_once 'controllers/EnlaceController.php';

$controller = new EnlaceController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'buscar':
        $controller->buscar();
        break;
    default:
        $controller->index();
        break;
}