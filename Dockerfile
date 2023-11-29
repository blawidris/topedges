FROM richarvey/nginx-php-fpm:2.0.0

# Copy composer.lock and composer.json
COPY ./src/composer.lock ./src/composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
      build-essential \
      libpng-dev \
      libjpeg62-turbo-dev \
      libfreetype6-dev \
      locales \
      zip \
      jpegoptim optipng pngquant gifsicle \
      vim \
      unzip \
      git \
      curl \
      libonig-dev \
      libzip-dev \
      libgd-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure gd --with-external-gd --with-freetype --with-jpeg \
      && docker-php-ext-install pdo_mysql mbstring zip exif bcmath pcntl gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy env.production to env  
COPY .env.production .env

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV staging
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set ownership and permissions
RUN chown -R www:www /var/www/html \
      && chmod -R 755 /var/www/html

# Copy existing application directory permissions
COPY --chown=www:www . .

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]