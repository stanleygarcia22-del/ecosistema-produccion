# restaurante-buena-mesa-api
Desarrollo de APIs RESTful Profesionales: Implementación de Eloquent ORM y Arquitectura Limpia para la Gestión de Datos

# 🍽️ API RESTful — Gestión de Menú "La Buena Mesa"

API RESTful desarrollada con **Laravel 12** y **Eloquent ORM** para centralizar la gestión del menú del restaurante "La Buena Mesa". Permite operaciones CRUD completas y filtrado por categorías para integración con sistemas POS, aplicaciones web y móviles.

---

## 🛠️ Requisitos e Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/TU-USUARIO/restaurante-buena-mesa-api.git](https://github.com/TU-USUARIO/restaurante-buena-mesa-api.git)
   cd restaurante-buena-mesa-api

2. Instalar dependencias de PHP: composer install

3. Configurar el entorno: 

cp .env.example .env
php artisan key:generate

4. Ejecutar migraciones y datos de prueba (Seeders): php artisan migrate --seed

5. Iniciar el servidor local: php artisan serve

Listo, la API estará disponible en: http://127.0.0.1:8000/api

Estructura Principal del Proyecto
1. Modelo: app/Models/MenuItem.php
2. Controlador API: app/Http/Controllers/Api/MenuItemController.php
3. Rutas API: routes/api.php
4. Migración: database/migrations/xxxx_xx_xx_xxxxxx_create_menu_items_table.php
5. Seeder: database/seeders/MenuItemSeeder.php

Documentacion de Endpoints

GET /api/menu-items — Listar todos los elementos del menú.
GET /api/menu-items/{id} — Obtener un elemento específico.
POST /api/menu-items — Crear un nuevo elemento.
PUT / PATCH /api/menu-items/{id} — Actualizar un elemento existente.
DELETE /api/menu-items/{id} — Eliminar un elemento.
GET /api/menu-items/category/{category} — Filtrar por categoría (opcional).

