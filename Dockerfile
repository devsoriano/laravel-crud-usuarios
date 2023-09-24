# Usar la imagen oficial de PHP como base
FROM php:8.0-fpm

# Instalar dependencias y extensiones PHP
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código fuente de Laravel al contenedor
COPY . .

# Instalar Composer y las dependencias de Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando para iniciar el servidor PHP-FPM
CMD ["php-fpm"]
