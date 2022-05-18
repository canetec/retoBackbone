# Reto [Backbone](https://jobs.backbonesystems.io/challenge/1)

Para resolver este reto, he hecho lo siguiente:

- Crear un proyecto nuevo de Laravel 9, a través de [Laravel Sail](https://laravel.com/docs/9.x/sail#main-content)
- Agregar tooling para el desarrollo ([PHP CS Fixer](https://cs.symfony.com/), [PHPStan](https://phpstan.org/))
- Crear migraciones y modelos para los datos a utilizar
- Escribir tests para guiarme en el desarrollo
- Crear un comando para importar los datos el archivo `.txt` descargado del enlace en la descripción del reto.
- En el servidor de producción, tuve un inconveniente donde las tildes no se procesaban correctamente, 
asi que recurrí a medidas alternativas para reemplazarlos por caracteres ascii, utilizando las funciones `ord` y `chr` de PHP.
