FROM php:5.6.30-apache

EXPOSE 80

ADD ./html /var/www/html

RUN docker-php-ext-install mysql
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install pdo

#CMD ["/bin/bash"]