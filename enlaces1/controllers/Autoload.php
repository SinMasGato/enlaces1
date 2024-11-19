<?php
function autocargar($clase) {
    $directorios = [
        'controllers/',
        'models/'
    ];
    
    foreach ($directorios as $directorio) {
        if (file_exists('./' . $directorio . $clase . '.php')) {
            require_once './' . $directorio . $clase . '.php';
            return;
        }
    }
}

spl_autoload_register('autocargar');
?>