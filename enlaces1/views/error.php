?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="alert alert-danger text-center">
            <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
            <h3>Error</h3>
            <p><?php echo htmlspecialchars($mensaje); ?></p>
            <a href="index.php" class="btn btn-danger">
                <i class="fas fa-home"></i> Volver al inicio
            </a>
        </div>
    </div>
</body>
</html>

