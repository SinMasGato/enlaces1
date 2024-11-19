<div class="row">
    <div class="col-12 mb-4">
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>
    
    <?php if (empty($resultados)): ?>
        <div class="col-12">
            <div class="alert alert-info">No se encontraron resultados</div>
        </div>
    <?php else: ?>
        <?php foreach($resultados as $enlace): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $enlace['titulo']; ?></h5>
                        <p class="card-text">
                            <span class="badge bg-primary"><?php echo $enlace['categoria']; ?></span>
                            <span class="badge bg-secondary"><?php echo $enlace['tipo']; ?></span>
                        </p>
                        <a href="<?php echo $enlace['enlace']; ?>" class="btn btn-primary" target="_blank">
                            Visitar
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>