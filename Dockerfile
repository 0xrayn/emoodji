FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy project
COPY . .

# Create required Laravel directories
RUN mkdir -p bootstrap/cache \
    && mkdir -p storage/framework/{cache,sessions,views} storage/logs

# Permissions
RUN chmod -R 775 bootstrap/cache storage \
    && chown -R www-data:www-data bootstrap/cache storage

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install PHP dependencies without running artisan scripts
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Expose port
EXPOSE 8080

# Start Laravel on PHP built-in server
CMD php -S 0.0.0.0:8080 -t public
