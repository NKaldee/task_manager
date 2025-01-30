FROM php:fpm-alpine3.20

# Instalar dependencias necesarias para MySQL, Composer y otros paquetes
RUN apk add --no-cache \
    libpng libpng-dev \
    libjpeg-turbo libjpeg-turbo-dev \
    libwebp libwebp-dev \
    mysql-client \
    bash \
    git \
    && apk add --no-cache --virtual .build-deps gcc g++ make autoconf libc-dev \
    && docker-php-ext-install pdo_mysql \
    && apk del .build-deps

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de la aplicación
COPY . /var/www/html

# Instalar las dependencias de Composer (Laravel y Breeze)
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Ejecutar el servidor PHP-FPM
CMD ["php-fpm"]