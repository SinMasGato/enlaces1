<?php
class ViewController {
    public function mostrar() {
        $modelo = new ModelBBDD();
        $categorias = $modelo->getCategorias();
        $tipos = $modelo->getTipos();
        
        require_once './views/header.php';
        require_once './views/buscador.php';
        require_once './views/footer.php';
    }
}
?>