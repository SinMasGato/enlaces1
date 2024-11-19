# Sistema de Búsqueda de Enlaces MVC 🔍

Sistema web de gestión y búsqueda de enlaces utilizando arquitectura MVC y PHP.

## 🚀 Características

- Búsqueda por categorías
- Filtrado por lenguajes de programación
- Búsqueda por palabras en título
- Interfaz responsiva
- Manejo seguro de datos

## ⚙️ Requisitos

- PHP 7.4+
- MySQL 5.7+
- Servidor web (Apache/Nginx)
- Composer (opcional)

## 📦 Instalación

1. **Clonar repositorio**
```bash
git clone https://github.com/tuUsuario/enlaces-mvc.git
cd enlaces-mvc
```

2. **Configurar base de datos**
```php
// config/config.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'enlaces1');
define('DB_USER', 'root');
define('DB_PASS', '');
```

3. **Importar estructura**
```sql
CREATE DATABASE enlaces1;
USE enlaces1;

-- Crear vista
CREATE VIEW vista_enlaces AS
SELECT 
    v.pk_vinculo,
    v.enlace,
    v.titulo,
    v.fk_categoria,
    c.categoria,
    c.tipo
FROM vinculos v
JOIN categoria c ON v.fk_categoria = c.pk_categoria;
```

## 🏗️ Estructura MVC

```
enlaces-mvc/
├── config/
│   └── config.php
├── controllers/
│   └── EnlaceController.php
├── models/
│   └── EnlaceModel.php
├── views/
│   ├── busqueda.php
│   └── error.php
└── index.php
```

## 💻 Uso

1. **Modelo (EnlaceModel.php)**
```php
// Implementa conexión y consultas
$model = new EnlaceModel();
$enlaces = $model->buscarPorCategoria('PHP');
```

2. **Controlador (EnlaceController.php)**
```php
// Gestiona lógica de negocio
$controller = new EnlaceController();
$controller->buscar();
```

3. **Vista (busqueda.php)**
```php
// Muestra interfaz de usuario
include 'views/busqueda.php';
```

## 🔐 Seguridad

- Uso de PDO con consultas preparadas
- Escape de salidas HTML
- Validación de entradas
- Manejo estructurado de errores

## 🎨 Frontend

- Bootstrap 5
- Font Awesome 6
- JavaScript para interactividad
- Diseño responsivo

## 📝 Contribución

1. Fork el proyecto
2. Cree su rama de características
```bash
git checkout -b feature/AmazingFeature
```
3. Commit sus cambios
```bash
git commit -m 'Add: nueva característica'
```
4. Push a la rama
```bash
git push origin feature/AmazingFeature
```
5. Abra un Pull Request

## 📜 Licencia

Distribuido bajo la Licencia MIT. Ver `LICENSE` para más información.

## 📞 Contacto

Tu Nombre - [@tuTwitter](https://twitter.com/tuTwitter)

Link del proyecto: [https://github.com/tuUsuario/enlaces-mvc](https://github.com/tuUsuario/enlaces-mvc)
