<?php

class Router {
    private $routes = [];
    
    public function get($url, $callback) {
        $this->routes['GET'][$url] = $callback;
    }
    
    public function post($url, $callback) {
        $this->routes['POST'][$url] = $callback;
    }
    
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_GET['url'] ?? '';
        $url = trim($url, '/');
        
        if (isset($this->routes[$method][$url])) {
            $callback = $this->routes[$method][$url];
            return call_user_func($callback);
        }
        
        include 'views/error.php';
    }
}