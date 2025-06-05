FROM php:apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && echo "DirectoryIndex main.php index.php index.html" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html
EXPOSE 80
CMD ["apache2-foreground"]
