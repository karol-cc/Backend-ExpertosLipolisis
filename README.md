<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

# Expertos Lipólisis – Backend API

API Backend desarrollada en **Laravel 12** para la gestión integral de datos y contenidos de la clínica estética **Expertos Lipólisis**.  
El sistema permite administrar información visual (imágenes tipo _Before & After_) y datos provenientes de formularios de contacto, garantizando un almacenamiento seguro, consistente y preparado para análisis estadísticos.

---

## 📌 Descripción del proyecto

Este backend ofrece una **API REST** que centraliza la administración de:

-   Contenidos visuales de la clínica (Before & After).
-   Formularios de contacto con datos personales, servicio de interés y mensajes opcionales.
-   Registro y análisis de leads para métricas y seguimiento comercial.

El sistema está diseñado para un uso administrativo con acceso público controlado, integrándose de forma sencilla con aplicaciones frontend web o móviles.

---

## 🛠 Tecnologías utilizadas

-   PHP 8+
-   Laravel Framework 12
-   Laravel Eloquent ORM
-   MySQL
-   API REST
-   Laravel Sanctum (autenticación)
-   Laravel Storage (gestión de archivos)
-   UUID
-   Faker (factories y seeders para datos de prueba)

---

## ⚙️ Funcionalidades principales

-   Autenticación de administrador.
-   Gestión de contenidos visuales (CRUD de imágenes Before/After).
-   Subida y almacenamiento seguro de imágenes.
-   Manejo de formularios de contacto:
    -   Registro de nombre, teléfono, correo electrónico, servicio de interés y mensaje.
    -   Validación de datos y respuestas JSON.
    -   Almacenamiento para análisis y estadísticas.
-   Estadísticas de servicios más solicitados.
-   Actualización parcial de registros.
-   Eliminación automática de archivos asociados.
-   Exposición pública de contenidos visuales.

---

## 📁 Almacenamiento de imágenes

Las imágenes se almacenan en:
`storage/app/public`

Y se exponen mediante el enlace simbólico:
`/public/storage`

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

## 🔒 Seguridad

-   Autenticación mediante Laravel Sanctum
-   Rutas protegidas para acciones administrativas
-   Rutas públicas para visualización de contenidos

---

## 👩‍💻 Autoras

-   Ximena Baquero
-   Karol Cheverria
