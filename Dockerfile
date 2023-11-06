# Use an official PHP image as the base image
FROM php:8.1-fpm

# Install required dependencies and extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application files into the container
COPY . .

# Install Composer (a PHP dependency manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install

# Expose the container's port (if your Laravel app uses a different port, change it here)
EXPOSE 9000

# Start the PHP-FPM service
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
