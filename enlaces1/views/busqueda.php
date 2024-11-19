?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Enlaces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .search-form { background-color: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        .result-item { transition: all 0.3s ease; }
        .result-item:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .search-options { margin: 15px 0; }
        .badge-tipo { font-size: 0.8em; padding: 5px 10px; }
        .enlace-titulo { color: #2c3e50; text-decoration: none; }
        .enlace-titulo:hover { color: #3498db; }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4 text-center">
            <i class="fas fa-search"></i> Buscador de Enlaces
        </h1>
        
        <div class="search-form">
            <form method="POST" action="index.php?action=buscar" class="needs-validation" novalidate>
                <div class="search-options">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="tipo_busqueda" value="categoria" id="radioCategoria" <?php echo (!isset($_POST['tipo_busqueda']) || $_POST['tipo_busqueda'] == 'categoria') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="radioCategoria">
                            <i class="fas fa-folder"></i> Por Categoría
                        </label>
                        <select class="form-select mt-2" name="categoria" id="selectCategoria">
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat['categoria']); ?>">
                                    <?php echo htmlspecialchars($cat['categoria']); ?> 
                                    (<?php echo htmlspecialchars($cat['tipo']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="tipo_busqueda" value="lenguaje" id="radioLenguaje" <?php echo (isset($_POST['tipo_busqueda']) && $_POST['tipo_busqueda'] == 'lenguaje') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="radioLenguaje">
                            <i class="fas fa-code"></i> Por Lenguaje de Programación
                        </label>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="tipo_busqueda" value="titulo" id="radioTitulo" <?php echo (isset($_POST['tipo_busqueda']) && $_POST['tipo_busqueda'] == 'titulo') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="radioTitulo">
                            <i class="fas fa-font"></i> Por Título
                        </label>
                        <input type="text" class="form-control mt-2" name="busqueda" id="inputBusqueda" 
                               placeholder="Ingrese términos de búsqueda" 
                               value="<?php echo isset($_POST['busqueda']) ? htmlspecialchars($_POST['busqueda']) : ''; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>

        <?php if (!empty($busquedaActual)): ?>
            <div class="alert alert-info">
                <i class="fas fa-filter"></i> Filtro actual: <?php echo htmlspecialchars($busquedaActual); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($resultados) && !empty($resultados)): ?>
            <div class="row">
                <?php foreach ($resultados as $resultado): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card result-item h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo htmlspecialchars($resultado['enlace']); ?>" 
                                       target="_blank" 
                                       class="enlace-titulo">
                                        <i class="fas fa-link"></i> 
                                        <?php echo htmlspecialchars($resultado['titulo']); ?>
                                    </a>
                                </h5>
                                <div class="mt-2">
                                    <span class="badge bg-primary badge-tipo">
                                        <i class="fas fa-folder"></i> 
                                        <?php echo htmlspecialchars($resultado['categoria']); ?>
                                    </span>
                                    <span class="badge bg-secondary badge-tipo">
                                        <i class="fas fa-tag"></i> 
                                        <?php echo htmlspecialchars($resultado['tipo']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?php echo htmlspecialchars($resultado['enlace']); ?>" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i> Visitar
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (isset($resultados)): ?>
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> No se encontraron resultados
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[type="radio"]');
            const selectCategoria = document.getElementById('selectCategoria');
            const inputBusqueda = document.getElementById('inputBusqueda');

            function toggleInputs() {
                const selectedValue = document.querySelector('input[name="tipo_busqueda"]:checked').value;
                selectCategoria.disabled = selectedValue !== 'categoria';
                inputBusqueda.disabled = selectedValue !== 'titulo';
            }

            radios.forEach(radio => {
                radio.addEventListener('change', toggleInputs);
            });

            toggleInputs();
        });
    </script>
</body>
</html>

