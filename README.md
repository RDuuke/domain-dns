## Requerimientos

-Php version 8.1

-Extensiones necesarias por Laravel [Extensiones](https://laravel.com/docs/9.x/deployment#server-requirements)

-Las extensiones se habilitan en el php.ini

-[Composer](https://getcomposer.org/)

## Instalación

1 - Clonar repositorio.
2 - Ingresar en el directorio del proyecto.
3 - Ejecutar el comando.
``` bash
    composer install
```
4 - Duplicar archivo **.env.example** con el nombre **.env** que esta en el root del proyecto.
5 - Configurar las variables.
5.1
``` php
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    QUEUE_CONNECTION=database //Esta debe tener este valor

```
6 - Lanzar migraciones
``` bash
    php artisan migrate
```
7 - Levantar el servidor
``` bash
    php artisan serve
```
8 - Levantar los workers de los queue y schedule (ambos en terminales independientes)
``` bash
    php artisan schedule:work 
```
``` bash
    php artisan queue:work
```
## Consumo

Rutas:

1 - GET (http://127.0.0.1:8000/api/domain)
2 - POST (http://127.0.0.1:8000/api/domain)
Content-Type: application/json
``` json
{
  "name" : "https://google.com",
  "uuid" : "4127c8a4-04ca-46c6-89d9-8dcd2ec181f6"
}
```
3 - DELETE (http://127.0.0.1:8000/api/4127c8a4-04ca-46c6-89d9-8dcd2ec181f6/delete)

### Logs 

Esta ubicado en el directorio **storage/logs/dns.log**

