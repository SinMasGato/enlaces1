<?php
class Router {
    public function route() {
        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'ViewController';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        
        if (!file_exists('controllers/' . $controller . '.php')) {
            die('Controlador no encontrado');
        }
        
        require_once 'controllers/' . $controller . '.php';
        
        if (!class_exists($controller)) {
            die('Clase del controlador no existe');
        }
        
        $controllerInstance = new $controller();
        
        if (!method_exists($controllerInstance, $action)) {
            die('Acción no existe');
        }
        
        $controllerInstance->$action();
    }
}