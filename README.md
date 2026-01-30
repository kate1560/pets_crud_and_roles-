# 🐾 Pets CRUD - Sistema de Gestión de Mascotas

Sistema web desarrollado en Laravel + Jetstream para la gestión de mascotas, con autenticación, roles de usuario y control de acceso.

### El proyecto implementa un CRUD completo donde:

* Los usuarios normales solo pueden ver y gestionar sus propias mascotas.

* El administrador puede ver y gestionar las mascotas de todos los usuarios.

## 🚀 Tecnologías utilizadas

* Laravel 12

* Jetstream 

* Tailwind CSS

* SQLite

* PHP 

## 👥 Roles del sistema

#### Usuario (user)

Puede:

* Crear mascotas

* Ver solo sus propias mascotas

* Editar sus mascotas

* Eliminar sus mascotas

#### Administrador (admin)

Puede:

* Ver todas las mascotas del sistema

* Ver mascotas de todos los usuarios

* Editar cualquier mascota

* Eliminar cualquier mascota

## 🔐 Autenticación

El sistema utiliza Jetstream para:

* Registro

* Login

* Logout

* Protección de rutas con middleware

Todas las rutas del CRUD están protegidas con:

* auth:sanctum
* verified   

## 🧠 Lógica de negocio

Asociación de mascotas a usuarios

Cada mascota tiene:

* user_id


Lo que permite:

* Saber quién creó cada registro.

* Filtrar datos por usuario.

* Permitir acceso total solo al administrador.

## 🧩 Filtro por rol (core del sistema)

En el controlador:

public function index()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        $animals = Animal::paginate(10);
    } else {
        $animals = Animal::where('user_id', $user->id)->paginate(10);
    }

    return view('animals.index', compact('animals'));
}

* Es decir qué datos puede ver cada usuario según su rol.


## 🗃️ Base de datos

## Tabla `animals`

| Campo           | Tipo        |
|-----------------|-------------|
| id              | integer     |
| name            | string      |
| species         | string      |
| breed           | string      |
| age             | integer     |
| weight          | decimal     |
| color           | string      |
| is_vaccinated   | boolean     |
| notes           | text        |
| user_id         | foreign key |



## 🌱 Seeders

El proyecto incluye un seeder con datos de prueba:

* php artisan db:seed --class=AnimalSeeder


* Genera automáticamente mascotas de ejemplo.

## 👑 Crear un administrador

Desde Tinker:

* php artisan tinker

* $user = App\Models\User::where('email', 'admin.pets@gmail.com')->first();
* $user->role = 'admin';
* $user->save();

## ▶️ Instalación del proyecto
* git clone https://github.com/tu-repo/pets-crud
* cd pets-crud
* composer install
* npm install
* npm run dev
* php artisan migrate
* php artisan db:seed
* php artisan serve

## 📌 Funcionalidades implementadas

* CRUD completo

* Roles de usuario

* Autenticación

* Autorización por rol

* Relación usuario-mascotas

* Paginación

* Validaciones con FormRequest

* Diseño responsive con Tailwind

## 🧠 Conceptos aplicados (nivel profesional)

Este proyecto aplica:

* Arquitectura MVC real

* Control de acceso por roles

* Multiusuario

* Filtros por ownership (user_id)

* Seguridad por middleware

* Buenas prácticas Laravel

## 📷 Vista general

Usuario:

* Solo ve sus mascotas

Administrador:

* Ve todas las mascotas del sistema

## ✨ Estado del proyecto

* Proyecto finalizado y funcional al 100%
* Listo para presentación académica y portafolio profesional.