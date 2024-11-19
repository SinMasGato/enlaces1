<?php
class ResultadosController {
    private $modelo;
    
    public function __construct() {
        $this->modelo = new ModelBBDD();
    }
    
    public function buscar() {
        $resultados = [];
        
        if (isset($_POST['categoria'])) {
            $resultados = $this->modelo->getEnlacesByCategoria($_POST['categoria']);
        } elseif (isset($_POST['tipo'])) {
            $resultados = $this->modelo->getEnlacesByTipo($_POST['tipo']);
        } elseif (isset($_POST['busqueda'])) {
            $resultados = $this->modelo->getEnlacesByTitulo($_POST['busqueda']);
        }
        
        require_once './views/header.php';
        require_once './views/resultados.php';
        require_once './views/footer.php';
    }
}
?>