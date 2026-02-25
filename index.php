<?php
require_once 'config/Database.php';
require_once 'controllers/LibroController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new LibroController($db);

$url = $_GET['url'] ?? 'listar';

// Lógica de enrutamiento limpia
if ($url == 'guardar') {
    $controller->guardar();
} elseif ($url == 'crear') {
    include 'views/formulario_libro.php';
} elseif ($url == 'eliminar') {
    $controller->eliminar();
} else {
    // Por defecto muestra la lista
    $controller->listar();
}
?>