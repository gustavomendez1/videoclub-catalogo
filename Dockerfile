FROM php:8.2-apache

# 1. Instalar herramientas del sistema, Node.js y NPM
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql zip

# 2. Instalar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# 4. Copiar el código del proyecto
COPY . /var/www/html/

# 5. Establecer directorio de trabajo
WORKDIR /var/www/html

# 6. Instalar dependencias de PHP con Composer
RUN composer install --no-dev --optimize-autoloader

# 7. Instalar dependencias de JS y compilar assets con Vite
RUN npm install
RUN npm run build

# 8. Configurar la carpeta pública de Laravel en Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# 9. Otorgar permisos correctos a carpetas de almacenamiento y cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80