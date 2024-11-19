
<?php
class EnlaceModel {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER, 
                DB_PASS,
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }

    public function buscarPorCategoria($categoria) {
        $stmt = $this->db->prepare("SELECT * FROM vista_enlaces WHERE categoria = :categoria ORDER BY titulo");
        $stmt->execute(['categoria' => $categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorLenguaje() {
        $stmt = $this->db->query("SELECT * FROM vista_enlaces WHERE tipo = 'LENGUAJE' ORDER BY categoria, titulo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorTitulo($busqueda) {
        $stmt = $this->db->prepare("SELECT * FROM vista_enlaces WHERE LOWER(titulo) LIKE LOWER(:busqueda) ORDER BY categoria, titulo");
        $stmt->execute(['busqueda' => "%$busqueda%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategorias() {
        $stmt = $this->db->query("SELECT DISTINCT categoria, tipo FROM vista_enlaces ORDER BY categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}