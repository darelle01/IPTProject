# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl git libpng-dev libjpeg-dev libfreetype6-dev \
    libonib-dev libzip-dev libpq-dev libgd-dev lsb-release ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 18.x
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Configure PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring bcmath gd

# Apache configuration
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN a2enmod rewrite headers && \
    sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy only what's needed for composer install
COPY composer.json composer.lock ./

# Install production dependencies
RUN composer install --no-interaction --no-dev --no-scripts --no-autoloader

# Copy the rest of the application
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache public/

# Generate application key if not exists
RUN if [ ! -f .env ]; then cp .env.example .env && php artisan key:generate; fi

# Optimize autoloader
RUN composer dump-autoload --optimize && \
    composer run-script post-autoload-dump

# Install and build assets
RUN npm install && npm run build && npm cache clean --force

# Laravel setup
RUN php artisan storage:link && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 10000
CMD ["sh", "-c", "php artisan migrate --force && php artisan config:clear && php artisan cache:clear && apache2-foreground"]
