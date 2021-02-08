FROM php:8.0.1-apache
COPY /pages/ /var/www/html/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install pdo_mysql
EXPOSE 80