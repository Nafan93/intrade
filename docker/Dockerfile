#docker stop $(docker ps -a -q) && docker rm $(docker ps -a -q)
FROM php:7.4-fpm
# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/
# Set working directory
WORKDIR /var/www
# Install dependencies
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    build-essential \
    libmcrypt-dev \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg 
RUN docker-php-ext-install gd
RUN echo "max_file_uploads=100" >> /usr/local/etc/php/conf.d/docker-php-ext-max_file_uploads.ini
RUN echo "post_max_size=120M" >> /usr/local/etc/php/conf.d/docker-php-ext-post_max_size.ini
RUN echo "upload_max_filesize=120M" >> /usr/local/etc/php/conf.d/docker-php-ext-upload_max_filesize.ini
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
# Copy existing application directory contents
COPY . /var/www
# Copy existing application directory permissions
COPY --chown=www:www . /var/www
# Change current user to www
USER www
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]