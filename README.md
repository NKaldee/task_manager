# Laravel Project with Docker

Este proyecto Laravel está configurado para ejecutarse usando Docker, con servicios de PHP, MySQL y Nginx. A continuación, se describen los pasos para ejecutar el proyecto.

## Requisitos

- Docker
- Docker Compose

## Instalación

1. **Clonar el repositorio**

   Clona el repositorio en tu máquina local:

   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd <nombre_del_repositorio>


2. **Construir y ejecutar los contenedores**

   Usa Docker Compose para construir y levantar los contenedores:

   ```bash
   docker-compose up --build

   Este comando:
   * Construirá las imágenes de los contenedores.
   * Levantará los contenedores necesarios para PHP, MySQL y Nginx.

3. **Acceder a la aplicación**

   Una vez que los contenedores estén en funcionamiento, podrás acceder a la aplicación en tu navegador en:

   ```bash
   http://localhost

4. **Ejecutar migraciones**

   Dentro del contenedor de la aplicación, ejecuta las migraciones para preparar la base de datos:
   
   ```bash
   docker-compose exec app php artisan migrate