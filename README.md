<p align="center"><a href="http://cognox.carlosarevalocortes.tech/login" target="_blank"><img src="http://cognox.carlosarevalocortes.tech/storage/img/loginResult.png" width="400"></a></p>


## Acerca de la prueba

Esta es la prueba de ingreso para la empresa cognox al cargo de Lider Tecnico u Desarrollador Senior PHP.

Requerimientos del sistema:

- PHP > 8
- mysql > 8
- Laravel 9

En el proyecto se podrá dilucidar mi conocimiento en POO, el uso de Observers, principios Solid y aprovecho que laravel porque ya cuenta con el patrón de arquitectura MVC. 
Debido a que la prueba no fue tan compleja solo pude aplicar un patrón de comportamiento de tipo Strategy para establecer el principio solid abierto-cerrado en al controlador TransactionController, y aunque me hubiese encantado desacoplar el proyecto para mostrar mis conocimiento en react js, no me fue posible por los tiempos de los que dispongo debido a mis labores. 


## Instalacion

- Clona el repositorio [Respositorio](https://github.com/charlie210012/pruebaCognox.git)
- Corre el composer install
- Corre npm install
- Corre npm run dev
- Corre el comando php artisan migrate --seed

Nota 1: En este proyecto use la metodologia de desarrollo TDD por tanto hay pruebas de tipo unitaria y feature,
para verificar que pasan los caso que se diseñaron correr php artisan test

Nota: Si deseas usar DOCKER el proyecto tiene el docker-composer y los docker-file


## Usuarios y Casos de prueba

-Una vez en http://cognox.carlosarevalocortes.tech/login
-Ingrese las credenciales que se daran a continuación cada uno tiene diferentes permisos usela segun sea el caso

-Credencia 1:
usuario: 1144170160
password: 2205

Condiciones: Este usuario tiene dos cuentas habilitadas y un saldo precargado desde administración de 52 millones

-credencial 2:
usuario: 111245661
password: 1234

Condiciones: Este usuario tiene dos cuentas una habilitada y otra bloqueada y un salgo precargado, no debera dejar transferir entre cuentas porque solo tiene una cuenta habilitada, pero si a terceros si decide inscribir una cuenta.

credencial 3:
usuario: 13533556
password: 1234

Condiciones: Este usuario no tiene ninguna cuenta habilitada ni creada, por tanto no podra realizar ninguna transaccion

Estoy atento a cualquier retroalimentación

### Desarrollador

- **[Carlos Andres Arevalo Cortes](https://github.com/charlie210012)**


## Gracias por la oportunidad
