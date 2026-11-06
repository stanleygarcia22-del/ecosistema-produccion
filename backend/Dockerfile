# Etapa 1: Dependencias de Composer
FROM composer:2 AS vendor_builder
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Etapa 2: Imagen final de Producción
FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    oniguruma-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd xml ctype

WORKDIR /var/www/html
COPY . .
COPY --from=vendor_builder /app/vendor ./vendor

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]