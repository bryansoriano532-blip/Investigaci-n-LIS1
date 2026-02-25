<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenimiento de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Registrar Nuevo Libro</h3>
        </div>
        <div class="card-body">
            <form action="index.php?url=guardar" method="POST">
                <div class="mb-3">
                    <label class="form-label">ISBN (Formato: 000-0000000000):</label>
                    <input type="text" name="isbn" class="form-control" required 
                           pattern="\d{3}-\d{10}" title="Tres números, guion y diez números">
                </div>
                <div class="mb-3">
                    <label class="form-label">Título:</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Autor:</label>
                    <input type="text" name="autor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio:</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Guardar Libro</button>
            </form>
        </div>
    </div>
</body>
</html>