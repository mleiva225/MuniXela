# Descripción de proyecto

Este proyecto se realiza utilizando los siguientes aspectos:
 - **Framework:** [Página de Laravel](https://laravel.com)
 - **Librería 1:** [Página de Bootstrap](https://getbootstrap.com)
 - **Librería 2 (para generar QR):** [Página de PHP-QRCode](https://php-qrcode.readthedocs.io/en/main/)

 # Para una correcta instalación de desarrollo (Windows)
Partiendo del hecho de tener instalado PHP (Puede ser con XAMPP, pero deben poseer el path configurado), Composer, NPM, MySQL (Puede ser con XAMPP), se deben serguir los siguientes pasos:

 - Crear el archivo .env y configurar el entorno, para ello copiar el ejemplo que se posee en el repositorio y a la copia realizarle los cambios requeridos.

Recordar realizar la instalación de los componentes requeridos con:
 - composer install
 - npm install
 - npm run dev
 - npm run build
 - php artisan key:generate
 - php artisan migrate
 - php artisan migrate:fresh --seed 

Las siguientes líneas son de librerías y si da problemas ejecutarlas *(Opcional y no recomendable)*
- php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"

## Licencias

- **Laravel emplea la licencia [MIT licence](https://opensource.org/licenses/MIT)**
- **La librería para QR [MIT license](https://github.com/chillerlan/php-qrcode)**

## Anexos

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
