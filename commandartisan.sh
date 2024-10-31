php artisan migrate
php artisan config:cache
php artisan storage:link
chown -R www-data:www-data \
    /var/www/storage \
    /var/www/html
php artisan serve --host=0.0.0.0 --port=3000