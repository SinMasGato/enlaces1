<?php
session_start();
require_once './controllers/Autoload.php';

$controlador = isset($_GET['controller']) ? $_GET['controller'] : 'Vista';
$action = isset($_GET['action']) ? $_GET['action'] : 'mostrar';

$controlador .= 'Controller';
if (class_exists($controlador)) {
    $controller = new $controlador();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        $controller->mostrar();
    }
} else {
    $controller = new ViewController();
    $controller->mostrar();
}
?>