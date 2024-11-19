<div class="row justify-content-center mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Búsqueda por Categoría</div>
            <div class="card-body">
                <form action="index.php?controller=Resultados&action=buscar" method="post">
                    <select name="categoria" class="form-select mb-3">
                        <?php foreach($categorias as $cat): ?>
                            <option value="<?php echo $cat['categoria']; ?>">
                                <?php echo $cat['categoria']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Búsqueda por Tipo</div>
            <div class="card-body">
                <form action="index.php?controller=Resultados&action=buscar" method="post">
                    <select name="tipo" class="form-select mb-3">
                        <?php foreach($tipos as $tipo): ?>
                            <option value="<?php echo $tipo['tipo']; ?>">
                                <?php echo $tipo['tipo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Búsqueda por Título</div>
            <div class="card-body">
                <form action="index.php?controller=Resultados&action=buscar" method="post">
                    <input type="text" name="busqueda" class="form-control mb-3" required>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</div>