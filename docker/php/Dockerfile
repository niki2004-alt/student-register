FROM php:8.2-fpm

WORKDIR /var/www

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    git \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy start.sh first
COPY start.sh /start.sh
RUN chmod +x /start.sh



# Then copy the rest of the app (but make sure start.sh isn't overwritten)
COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader


CMD ["/start.sh"]

