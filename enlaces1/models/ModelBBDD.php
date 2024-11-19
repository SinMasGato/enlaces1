<?php
class ModelBBDD {
    private $conn;
    
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;dbname=enlaces1;charset=utf8",
                "root",
                ""
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
    
    public function getCategorias() {
        $sql = "SELECT DISTINCT categoria FROM vista_enlaces ORDER BY categoria";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTipos() {
        $sql = "SELECT DISTINCT tipo FROM vista_enlaces ORDER BY tipo";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEnlacesByCategoria($categoria) {
        $sql = "SELECT * FROM vista_enlaces WHERE categoria = ? ORDER BY titulo";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEnlacesByTipo($tipo) {
        $sql = "SELECT * FROM vista_enlaces WHERE tipo = ? ORDER BY titulo";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$tipo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getEnlacesByTitulo($busqueda) {
        $sql = "SELECT * FROM vista_enlaces WHERE titulo LIKE ? ORDER BY titulo";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['%' . $busqueda . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>