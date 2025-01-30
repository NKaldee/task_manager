# Laravel Project with Docker

Este proyecto Laravel está configurado para ejecutarse usando Docker, con servicios de PHP, MySQL y Nginx. A continuación, se describen los pasos para ejecutar el proyecto.

## Requisitos

- Docker
- Docker Compose
- Nodejs
- NPM

## Instalación

1. **Clonar el repositorio**

   Clona el repositorio en tu máquina local:

   ```bash
   git clone https://github.com/NKaldee/task_manager
   cd task_manager


2. **Construir y ejecutar los contenedores y migraciones**

   Usa Docker Compose para construir y levantar los contenedores:

   ```bash
   npm install
   npm run build
   docker-compose up --build -d
   docker-compose exec app composer install
   docker-compose exec app php artisan migrate

   Este comando:
   * Construirá las imágenes de los contenedores.
   * Levantará los contenedores necesarios para PHP, MySQL y Nginx.

3. **Acceder a la aplicación**

   Una vez que los contenedores estén en funcionamiento, podrás acceder a la aplicación en tu navegador en:

   ```bash
   http://localhost