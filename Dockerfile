FROM php:7.4-apache

RUN docker-php-ext-install mysqli

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

RUN echo 'ServerName 127.0.0.1' >> /etc/apache2/apache2.conf

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

RUN service apache2 restart
