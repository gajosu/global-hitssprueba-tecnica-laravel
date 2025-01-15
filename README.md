# Prueba Técnica - API de Administración de Usuarios

API REST desarrollada en Laravel 11 para la administración de usuarios, departamentos y cargos.

## Requisitos

- Docker y Docker Compose
- PHP 8.2 o superior
- Composer

## Tecnologías Utilizadas

- Laravel 11
- SQL Server 2022
- Docker
- PHPUnit para tests

## Estructura del Proyecto

El proyecto sigue una arquitectura en capas:

- Controllers: Manejo de requests y responses
- Services: Lógica de negocio
- Models: Modelos de datos
- Tests: Tests de feature para cada endpoint

## Instalación

1. Clonar el repositorio:

```bash
git clone https://github.com/gajosu/global-hitssprueba-tecnica-laravel
cd prueba-tecnica-laravel
```

2. Instalar dependencias:

```bash
composer install
```

3. Configurar el archivo .env:

```bash
cp .env.example .env
```

4. Levantar laravel sail:

```bash
./vendor/bin/sail up -d
```

5. Generar la clave de aplicación:

```bash
php artisan key:generate
```

6. Ejecutar migraciones y seeders:

```bash
./vendor/bin/sail artisan migrate --seed
```


## Endpoints Disponibles

### Usuarios
- GET /api/users - Listar usuarios
- POST /api/users - Crear usuario
- PUT /api/users/{id} - Actualizar usuario
- DELETE /api/users/{id} - Eliminar usuario

### Departamentos
- GET /api/departamentos - Listar departamentos activos

### Cargos
- GET /api/cargos - Listar cargos activos

## Ejecutar Tests

```bash
./vendor/bin/sail artisan test
```


## Base de Datos

El proyecto utiliza SQL Server 2022 con las siguientes tablas:

- users
- departamentos
- cargos

Las credenciales por defecto son:
- Usuario: sail
- Contraseña: YourStrong!Passw0rd
- Base de datos: prueba


## Estructura de Archivos Principales

- `app/Http/Controllers/API/` - Controladores API
- `app/Services/` - Servicios con lógica de negocio
- `app/Models/` - Modelos Eloquent
- `database/migrations/` - Migraciones de base de datos
- `database/seeders/` - Seeders para datos iniciales
- `tests/Feature/` - Tests de feature
- `routes/api.php` - Definición de rutas API
