<?php
class ModelBBDD {
    private $host = "localhost";
    private $db = "enlaces1";
    private $user = "root";
    private $pass = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getEnlaces() {
        try {
            $stmt = $this->conn->query("SELECT * FROM vista_enlaces");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Error en consulta: " . $e->getMessage());
        }
    }

    public function getEnlacesByCategoria($categoria) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM vista_enlaces WHERE categoria = :categoria");
            $stmt->execute(['categoria' => $categoria]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Error en consulta: " . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}

// Ejemplo de uso:
$model = new ModelBBDD();
$enlaces = $model->getEnlaces();
// Para mostrar todos los enlaces
foreach($enlaces as $enlace) {
    echo "Título: {$enlace['titulo']} - Categoría: {$enlace['categoria']}<br>";
}