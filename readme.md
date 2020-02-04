# Plantilla Laravel 6, Vue 2.6, Vuex 3, 
Plantilla para inicio de proyectos grandes y medianos basados en patrones MVC, servicios RESTful, microservicios, JWT adaptables a cualquier necesidad, CORS configurados para PHP y aplicaciones SPA

## Instalación:
* Clonar el repositorio
* Copiar y renombra el archivo `.env.example` to `.env`
* Configurar el archivo `.env` con la conexión de la base de datos y nombre del aplicativo
* Crear las carpetas `storage/framework/cache`, `storage/framework/sessions`, `storage/framework/views` o corre el siguiente comando en linux `mkdir -p storage/framework/{sessions,views,cache}`
* Ejecuta en la consola o terminal `composer install`
* Ejecuta en la consola o terminal `php artisan key:generate`
* Ejecuta en la consola o terminal `php artisan jwt:secret`
* Ejecuta en la consola o terminal `php artisan migrate`
* Ejecuta en la consola o terminal `npm install`

## Uso
* Ejecuta en la consola o terminal `npm run watch` para compilar los nuevos cambios
* Ejecuta en la consola o terminal `npm run hot` para recarga continua
* Ejecuta en la consola o terminal `npm run prod` para producción

## Bonus
* Se agregó el comando "rest:model" para crear servicios con un solo comando(ej: php artisan rest:model nombre_modelo -mc) crea toda la estructura desde el modelo controlador y migración con servicios RESTful implementados
* Control de acciones incluído para todos los cambios dentro del sistema
* Configuración de CORS en el archivo `public/index.php`

## Nota

Este template fue diseñado a partir de varias plantillas Laravel y VueJS de código abierto y puede seguir siendo mejorado...