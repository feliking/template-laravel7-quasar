# Plantilla Laravel 7, RestFul, Cors, JWT
Plantilla para inicio de proyectos grandes y medianos basados en patrones MVC, servicios RESTful, microservicios, JWT adaptables a cualquier necesidad, CORS configurados para PHP

## Instalación:
* Clonar el repositorio
* Copiar y renombra el archivo `.env.example` to `.env`
* Configurar el archivo `.env` con la conexión de la base de datos y nombre del aplicativo
* Crear las carpetas `storage/framework/cache`, `storage/framework/sessions`, `storage/framework/views` o corre el siguiente comando en linux `mkdir -p storage/framework/{sessions,views,cache}`
* Ejecuta en la consola o terminal `composer install`
* Ejecuta en la consola o terminal `php artisan key:generate`
* Ejecuta en la consola o terminal `php artisan jwt:secret`
* Ejecuta en la consola o terminal `php artisan migrate`

## Uso
* Copiar los archivos de producción de su aplicación frontend en `resources/views`

## Bonus
* Se agregó el comando "rest:model" para crear servicios con un solo comando(ej: php artisan rest:model nombre_modelo -mc) crea toda la estructura desde el modelo controlador y migración con servicios RESTful implementados
* Control de acciones incluído para todos los cambios dentro del sistema