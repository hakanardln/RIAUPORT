FROM php:8.2-fpm

# Install ekstensi dan tools yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Install Composer (copy dari image resmi composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy file composer dulu untuk cache layer
COPY composer.json composer.lock* ./

# Install dependency Laravel (vendor)
RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist || true

# Copy semua source code (akan di-overwrite oleh volume saat dev)
COPY . .

# Set permission (kalau pakai Linux)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]
