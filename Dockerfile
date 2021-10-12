FROM php:8.0-apache

RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY code/ /var/www/html/

EXPOSE 80
