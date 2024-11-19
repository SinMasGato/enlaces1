<?php

class EnlaceController {
    private $model;

    public function __construct() {
        try {
            $this->model = new EnlaceModel();
        } catch (Exception $e) {
            $this->mostrarError($e->getMessage());
        }
    }

    private function mostrarError($mensaje) {
        include 'views/error.php';
        die();
    }

    public function index() {
        try {
            $categorias = $this->model->getCategorias();
            $resultados = [];
            $busquedaActual = '';
            include 'views/busqueda.php';
        } catch (Exception $e) {
            $this->mostrarError($e->getMessage());
        }
    }

    public function buscar() {
        try {
            $resultados = [];
            $busquedaActual = '';
            
            if (isset($_POST['tipo_busqueda'])) {
                switch ($_POST['tipo_busqueda']) {
                    case 'categoria':
                        if (isset($_POST['categoria'])) {
                            $resultados = $this->model->buscarPorCategoria($_POST['categoria']);
                            $busquedaActual = "Categoría: {$_POST['categoria']}";
                        }
                        break;
                    case 'lenguaje':
                        $resultados = $this->model->buscarPorLenguaje();
                        $busquedaActual = "Lenguajes de Programación";
                        break;
                    case 'titulo':
                        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
                            $resultados = $this->model->buscarPorTitulo($_POST['busqueda']);
                            $busquedaActual = "Título contiene: {$_POST['busqueda']}";
                        }
                        break;
                }
            }
            
            $categorias = $this->model->getCategorias();
            include 'views/busqueda.php';
        } catch (Exception $e) {
            $this->mostrarError($e->getMessage());
        }
    }
}