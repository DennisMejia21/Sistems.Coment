# Sistema de Comentarios

## Descripción

Este proyecto consiste en el desarrollo de un sistema de comentarios utilizando **PHP**, **MySQL** y **PDO**. El objetivo principal es poner en práctica los conceptos fundamentales del desarrollo web del lado del servidor, trabajando con una estructura organizada por funciones y scripts, consultas preparadas, manejo de sesiones y operaciones CRUD.

El sistema permite que un usuario se registre, inicie sesión de forma segura y publique comentarios que quedan almacenados en una base de datos. Además, la aplicación utiliza sesiones para controlar el acceso a las páginas protegidas y mantener la autenticación del usuario.

## Objetivos

* Aprender a conectar una aplicación PHP con una base de datos MySQL utilizando PDO.
* Implementar un sistema de registro e inicio de sesión con contraseñas encriptadas mediante `password_hash()` y verificadas con `password_verify()`.
* Utilizar sesiones (`$_SESSION`) para controlar la autenticación de los usuarios.
* Aplicar consultas preparadas para prevenir ataques de inyección SQL.
* Desarrollar un CRUD de comentarios (Crear, Leer, Actualizar y Eliminar).
* Organizar el proyecto separando la lógica de negocio, el procesamiento de formularios y la interfaz mediante carpetas como `functions/` y `scripts/`.
* Utilizar Docker para crear un entorno de desarrollo sencillo y reproducible.

## Tecnologías utilizadas

* PHP 8
* MySQL 8
* PDO (PHP Data Objects)
* Apache
* phpMyAdmin
* Docker y Docker Compose
* HTML5

## Funcionalidades

* Registro de usuarios.
* Generación automática del nombre de usuario.
* Inicio y cierre de sesión.
* Manejo de sesiones.
* Creación de comentarios.
* Visualización de comentarios.
* Base preparada para implementar la edición y eliminación de comentarios.

## Estructura del proyecto

```text
backend/
│── src/
│   ├── functions/
│   ├── scripts/
│   ├── index.php
│   ├── login.php
│   ├── register.php
│   └── logout.php
│
database/
│── database.sql

docker-compose.yml
README.md
```

## Estado del proyecto

Actualmente el proyecto cuenta con el sistema de autenticación de usuarios y la creación de comentarios. Como siguiente paso se implementará el CRUD completo de comentarios, permitiendo editar y eliminar únicamente los comentarios pertenecientes al usuario que haya iniciado sesión.
