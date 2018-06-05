FROM php:7-apache

WORKDIR /var/www/html

RUN apt update -y
RUN apt install -y git

# install php plugin
#RUN pecl install redis && docker-php-ext-enable redis
#RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN docker-php-ext-install mysql
#RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

COPY php.ini /usr/local/etc/php/php.ini
COPY composer.json /var/www/html/composer.json

#install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN ls

#compser install
RUN chmod 777 -R /var/www
RUN useradd -p $(openssl passwd -1 thepassword) phpcomposer
RUN su - phpcomposer -c "cd /var/www/html && php composer.phar install"
