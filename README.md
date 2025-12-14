<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

# Perfect Aesthetic – Backend API

Backend API desarrollado en **Laravel 12** para la gestión de contenidos de una clínica estética.
El sistema permite administrar información con imágenes tipo **Before & After**, asegurando
un manejo correcto del almacenamiento, seguridad y consistencia de los datos.

---

## 📌 Descripción del proyecto

Este backend proporciona una **API REST** que centraliza la administración de contenidos visuales
y datos asociados, facilitando su consumo desde aplicaciones frontend web o móviles.
Está orientado a un uso administrativo y público controlado.

---

## 🛠 Tecnologías utilizadas

-   PHP 8+
-   Laravel Framework 12
-   Laravel Eloquent ORM
-   MySQL
-   API REST
-   Laravel Sanctum
-   Laravel Storage
-   UUID

---

## ⚙️ Funcionalidades principales

-   Autenticación de administrador
-   Gestión de contenidos (CRUD)
-   Subida y almacenamiento de imágenes (Before / After)
-   Actualización parcial de registros
-   Eliminación automática de archivos asociados
-   Exposición pública de contenidos visuales
-   Manejo de validaciones y respuestas JSON

---

## 📁 Almacenamiento de imágenes

Las imágenes se almacenan en:
storage/app/public

Y se exponen mediante el enlace simbólico:
/public/storage

Es obligatorio ejecutar:

```bash
php artisan storage:link
```

---

## 🚀 Instalación y configuración

```bash
git clone https://github.com/karool-cc/perfectesthetic-backend.git
cd perfectesthetic-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Configurar las variables de entorno en el archivo .env según el entorno de ejecución.

---

## 🔗 Endpoints principales

| Método | Endpoint                    | Descripción                 |
| ------ | --------------------------- | --------------------------- |
| GET    | `/api/v1/before-after`      | Obtener contenidos públicos |
| POST   | `/api/v1/before-after`      | Crear contenido             |
| PUT    | `/api/v1/before-after/{id}` | Actualizar contenido        |
| DELETE | `/api/v1/before-after/{id}` | Eliminar contenido          |

---

## 🗑 Eliminación de contenidos

Al eliminar un registro:

-   Se elimina el registro de la base de datos
-   Se eliminan automáticamente las imágenes asociadas del almacenamiento
-   Esto garantiza consistencia entre datos y archivos físicos.

---

## 🔒 Seguridad

-   Autenticación mediante Laravel Sanctum
-   Rutas protegidas para acciones administrativas
-   Rutas públicas para visualización de contenidos

---

## 👩‍💻 Autoras

-   Ximena Baquero
-   Karol Cheverria
