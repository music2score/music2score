FROM php:8.0.1-apache
COPY /pages/ /var/www/html/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip
EXPOSE 80