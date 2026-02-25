<?php
class Libro {
    private $conn;
    private $table_name = "libros";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Esta es la función que soluciona el Fatal Error
    public function crear($isbn, $titulo, $autor, $precio) {
        $query = "INSERT INTO " . $this->table_name . " (isbn, titulo, autor, precio) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Retorna verdadero si se guardó bien
        return $stmt->execute([$isbn, $titulo, $autor, $precio]);
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function eliminar($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([$id]);
}
}