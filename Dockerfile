FROM php:8.2-apache

# 1. Instalar herramientas del sistema y extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# 2. Instalar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# 4. Copiar todo el código de tu proyecto al contenedor
COPY . /var/www/html/

# 5. Establecer el directorio de trabajo
WORKDIR /var/www/html

# 6. Instalar las dependencias de Composer sin entornos de desarrollo
RUN composer install --no-dev --optimize-autoloader

# 7. Configurar la carpeta pública de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# 8. Otorgar permisos correctos a storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80