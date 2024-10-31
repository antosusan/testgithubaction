# Gunakan image PHP dengan Apache
FROM php:fpm-alpine

# Install ekstensi yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql

# Salin file dari folder proyek ke dalam container
COPY . /var/www/html

# Set hak akses
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set direktori kerja
WORKDIR /var/www/html
RUN apk add curl vim 
# Jalankan perintah Composer
RUN apk update && apk add git unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependensi Composer
RUN composer install


# RUN ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=3000"]
# EXPOSE 3000