# Use PHP 8.2 with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl git libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev libpq-dev libgd-dev lsb-release ca-certificates \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js v18
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    rm -rf /var/lib/apt/lists/*

# Enable Apache mods
RUN a2enmod rewrite headers

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_pgsql pgsql zip mbstring bcmath gd

# Set Apache Document Root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache configs to point to /public folder
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    echo "<Directory /var/www/html/public>" >> /etc/apache2/apache2.conf && \
    echo "    Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf && \
    echo "    AllowOverride All" >> /etc/apache2/apache2.conf && \
    echo "    Require all granted" >> /etc/apache2/apache2.conf && \
    echo "</Directory>" >> /etc/apache2/apache2.conf

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application source
COPY . .

# Install PHP and JS dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN npm install && npm run build && npm cache clean --force

# Set permissions
RUN mkdir -p storage/framework/{cache,sessions,views} \
    storage/logs && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R ug+rwx storage bootstrap/cache

# Laravel setup
RUN php artisan storage:link && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Add wait-for-postgres script
COPY ./wait-for-postgres.sh /usr/local/bin/wait-for-postgres.sh
RUN chmod +x /usr/local/bin/wait-for-postgres.sh

# Remove EXPOSE (Render injects PORT)
# EXPOSE 10000  <-- ❌ Remove this

# Start Apache with dynamic PORT on Render
CMD ["bash", "-c", "\
  echo 'Render injected PORT: $PORT'; \
  wait-for-postgres.sh && \
  php artisan migrate --force && \
  export PORT=${PORT:-8080} && \
  sed -i \"s/Listen 80/Listen ${PORT}/\" /etc/apache2/ports.conf && \
  sed -i \"s/<VirtualHost \\*:80>/<VirtualHost *:${PORT}>/\" /etc/apache2/sites-enabled/000-default.conf && \
  apache2-foreground \
"]
