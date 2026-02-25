<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Libros Registrados</h2>
        <a href="index.php?url=crear" class="btn btn-primary">Agregar Nuevo Libro</a>
    </div>

  <table class="table table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ISBN</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Precio</th>
            <th>Acciones</th> </tr>
    </thead>
    <tbody>
        <?php foreach($libros as $libro): ?>
        <tr>
            <td><?php echo $libro['isbn']; ?></td>
            <td><?php echo $libro['titulo']; ?></td>
            <td><?php echo $libro['autor']; ?></td>
            <td>$<?php echo number_format($libro['precio'], 2); ?></td>
            <td> <a href="index.php?url=eliminar&id=<?php echo $libro['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Seguro que quieres eliminar este libro?')">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>