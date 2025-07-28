FROM php:8.2-fpm

# Update and install required dependencies
RUN apt-get update && apt-get install -y \
    apt-transport-https \
    ca-certificates \
    gnupg2 \
    curl \
    lsb-release \
    nginx \
    mariadb-server \
    libzip-dev \
    zip unzip git \
 && rm -rf /var/lib/apt/lists/*

# Optional: Install PHP extensions (uncomment as needed)
# RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel app source
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions for Laravel storage
RUN chown -R www-data:www-data storage bootstrap/cache

# Configure Nginx
RUN rm /etc/nginx/sites-enabled/default
COPY nginx.conf /etc/nginx/sites-available/laravel.conf
RUN ln -s /etc/nginx/sites-available/laravel.conf /etc/nginx/sites-enabled/

# Copy startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Expose web port
EXPOSE 80

# Start all services
CMD ["/start.sh"]
