## habilitar apis 
php artisan install:api

## hacer correr las migraciones

php artisan migrate

## Crear modelo y migracion, seeder, factory y controller para api

php artisan make:model Libro -msfc --api

## Luego de crear el modelo

### en la migracion colocar los campos

## Crear los seeders 
no olivdar enlazar los seeders al databaseseeder

## hacer correr las migraciones y los seeders

php artisan migrate:fresh --seed

## hacer correr la api
php artisan serve

## ver rutas que existen
php artisan route:list

## instalar jwt

composer require firebase/php-jwt

# ewscribi condigo en el archivo .env
JWT_SECRET = secret
JWT_ALGORITHM = HS256

## instalar 