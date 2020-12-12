# Plantilla Laravel 7, RestFul, Cors, JWT
Plantilla para inicio de proyectos grandes y medianos basados en patrones MVC, servicios RESTful, microservicios, JWT adaptables a cualquier necesidad, CORS configurados para PHP

## Requisitos:
* Composer 1.10 o superior
* Php 7.2 o superior
* Node JS con NPM 12 o superior
* Quasar CLI 1.x o superior

## Instalación:
* Clonar el repositorio
* Copiar y renombra el archivo `.env.example` to `.env`
* Configurar el archivo `.env` con la conexión de la base de datos y nombre del aplicativo
* Crear las carpetas `storage/framework/cache`, `storage/framework/sessions`, `storage/framework/views` o corre el siguiente comando en linux `mkdir -p storage/framework/{sessions,views,cache}`
* Ejecuta en la consola o terminal `composer install`
* Ejecuta en la consola o terminal `php artisan key:generate`
* Ejecuta en la consola o terminal `php artisan jwt:secret`
* Ejecuta en la consola o terminal `php artisan migrate:fresh`
* Ejecuta en la consola o terminal `php artisan db:seed`

* Ingresa a la carpeta `frontend/` y ejecuta los siguientes comandos:
* Ejecuta en la consola o terminal `npm i`
* Para levantar el servidor de desarrollo ejecuta en la terminal o consola `quasar dev`

## Para producción:
* Para generar los archivos de producción ejecuta en la consola o terminal `quasar build`
* Ahora copia los archivos generados en la ruta `/dist/spa` a la ruta `/public` de laravel y listo!!!!!

## Bonus
* Se agregó el comando "rest:model" para crear servicios con un solo comando(ej: php artisan rest:model nombre_modelo -mc) crea toda la estructura desde el modelo controlador y migración con servicios RESTful implementados
* Control de acciones incluído para todos los cambios dentro del sistema