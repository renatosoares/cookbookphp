FROM php:7.4-apache

RUN apt-get update
RUN apt-get install -y build-essential
RUN apt-get install -y zip
RUN apt-get install -y vim
RUN apt-get install -y git
RUN apt-get install -y curl

RUN docker-php-ext-install pcntl

RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN composer g require psy/psysh:@stable

WORKDIR /var/www/cookbook.d3v/src/backend/grains_of_sand/

COPY . /var/www/cookbook.d3v/src/backend/grains_of_sand
COPY ./.services/php/etc/apache2/sites-available/* /etc/apache2/sites-available/

RUN a2enmod rewrite

RUN a2dissite default-ssl.conf

ARG uid

RUN useradd -G www-data,root -u $uid -ms /bin/bash -d /home/devuser devuser

RUN cd /home/devuser && mkdir -p .composer && chown -R devuser:devuser .composer
RUN cd /home/devuser && mkdir -p .config && chown -R devuser:devuser .config
