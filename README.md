# Buscador de Enlaces - Manual de Implementación MVC

Autor: Fredy Magaña
Version: PHP 8.2
Fecha:19/11/2024

![Estructura MVC](https://www.patterns.dev/img/mvc/mvc.png)

## 📋 Índice
1. [Introducción](#introducción)
2. [Estructura del Proyecto](#estructura-del-proyecto)
3. [Base de Datos](#base-de-datos)
4. [Implementación Paso a Paso](#implementación-paso-a-paso)
5. [Guía de Usuario](#guía-de-usuario)
6. [Consideraciones Técnicas](#consideraciones-técnicas)

## 🎯 Introducción

Este proyecto implementa un buscador de enlaces utilizando el patrón MVC (Modelo-Vista-Controlador) en PHP. Permite realizar búsquedas por categorías, lenguajes de programación y palabras clave en títulos.

### Características Principales
- Búsqueda por categorías
- Filtrado por lenguajes de programación
- Búsqueda por palabras clave
- Interfaz responsiva
- Gestión de errores

## 📂 Estructura del Proyecto

```
enlaces1/
├── assets/
│   └── css/
│       └── style.css
├── controllers/
│   ├── Autoload.php
│   ├── ResultadosController.php
│   └── VistaController.php
├── models/
│   └── ModelBBDD.php
├── views/
│   ├── buscador.php
│   ├── footer.php
│   ├── header.php
│   └── resultados.php
└── index.php
```

## 💾 Base de Datos

### Estructura de la Vista
```sql
CREATE VIEW vista_enlaces AS
SELECT v.pk_vinculo,
       v.enlace,
       v.titulo,
       v.fk_categoria,
       c.categoria,
       c.tipo
FROM vinculos v
JOIN categoria c ON v.fk_categoria = c.pk_categoria;
```

## 🛠️ Implementación Paso a Paso

### 1. Configuración Inicial

1.1. Crear la estructura de directorios:
```bash
mkdir -p enlaces1/{assets/css,controllers,models,views}
```

1.2. Configurar la base de datos:
- Crear la base de datos `enlaces1`
- Importar las tablas `categoria` y `vinculos`
- Crear la vista `vista_enlaces`

### 2. Modelo (Model)

`models/ModelBBDD.php`:
```php
class ModelBBDD {
    private $conn;
    
    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;dbname=enlaces1;charset=utf8",
                "root",
                ""
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
    
    // Métodos de consulta...
}
```

### 3. Vistas (Views)

Las vistas utilizan Bootstrap 5 para el diseño responsivo:

`views/header.php`:
```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Enlaces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>
<body>
```

### 4. Controladores (Controllers)

`controllers/VistaController.php`:
```php
class VistaController {
    public function mostrar() {
        $modelo = new ModelBBDD();
        $categorias = $modelo->getCategorias();
        $tipos = $modelo->getTipos();
        
        require_once './views/header.php';
        require_once './views/buscador.php';
        require_once './views/footer.php';
    }
}
```

## 👤 Guía de Usuario

### Pantalla Principal
![Pantalla Principal](https://via.placeholder.com/800x400.png?text=Pantalla+Principal)

1. **Búsqueda por Categoría**
   - Seleccionar una categoría del desplegable
   - Hacer clic en "Buscar"

2. **Búsqueda por Tipo**
   - Seleccionar un tipo (LENGUAJE, FRAMEWORK, etc.)
   - Hacer clic en "Buscar"

3. **Búsqueda por Título**
   - Ingresar palabra clave
   - Hacer clic en "Buscar"

### Resultados de Búsqueda
![Resultados](https://via.placeholder.com/800x400.png?text=Resultados)

Los resultados se muestran en tarjetas que incluyen:
- Título del enlace
- Categoría
- Tipo
- Botón para visitar el enlace

## 🔧 Consideraciones Técnicas

### Requisitos del Sistema
- PHP 7.4 o superior
- MySQL 5.7 o superior
- PDO PHP Extension
- mod_rewrite habilitado (Apache)

### Seguridad
- Uso de PDO para prevenir SQL Injection
- Escape de datos HTML
- Validación de entradas

### Rendimiento
- Consultas SQL optimizadas
- Carga de recursos minimizada
- Caché de consultas frecuentes

## 🤝 Contribuciones

Para contribuir al proyecto:
1. Fork del repositorio
2. Crear rama para nueva característica
3. Commit de cambios
4. Push a la rama
5. Crear Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.
