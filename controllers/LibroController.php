<?php
require_once 'models/Libro.php';

class LibroController {
    private $db;
    private $libro;

    public function __construct($conexion) {
        $this->db = $conexion;
        $this->libro = new Libro($this->db);
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $isbn = $_POST['isbn'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $precio = $_POST['precio'];

            // Regex para validar el formato del ISBN
            $regexISBN = "/^\d{3}-\d{10}$/";

            if (preg_match($regexISBN, $isbn)) {
                // Si guarda con éxito, redirige a la lista
                if ($this->libro->crear($isbn, $titulo, $autor, $precio)) {
                    header("Location: index.php?url=listar");
                    exit(); // Es importante poner exit después de un header
                }
            } else {
                echo "Error: El ISBN no cumple el formato requerido.";
            }
        }
    }

    public function listar() {
        $libros = $this->libro->obtenerTodos();
        include 'views/lista_libros.php';
    }

    public function eliminar() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($this->libro->eliminar($id)) {
            // Después de borrar, regresamos a la lista actualizada
            header("Location: index.php?url=listar");
            exit();
        }
    }
}
}