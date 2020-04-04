FROM php:7.4.2-apache

RUN apt-get update -y
RUN apt-get upgrade -y

RUN apt-get install -y libpng-dev libzip-dev zlib1g-dev libcurl3-dev libxml2-dev libonig-dev

RUN docker-php-ext-install pdo_mysql zip gd ctype curl dom iconv mbstring

RUN a2enmod rewrite headers env dir mime

RUN touch /etc/apache2/sites-available/administration.conf && a2ensite administration.conf
RUN a2dissite 000-default.conf

CMD ["apache2-foreground"]