FROM php:7.3.24-fpm

LABEL maintainer="Joao Pinheiro <joao.pinheiro@squadra.com.br>"

# Set Environment Variables
ENV DEBIAN_FRONTEND noninteractive

# Replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# make sure apt is up to date
RUN apt-get update --fix-missing
RUN apt-get install -y curl
RUN apt-get install -y build-essential git libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libxml2-dev

###########################################################################
# PHP COMPOSER
###########################################################################

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

###########################################################################
# PHP REDIS EXTENSION
###########################################################################

ARG INSTALL_PHPREDIS=false

RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install Php Redis Extension
    if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
      pecl install -o -f redis-4.3.0; \
    else \
      pecl install -o -f redis; \
    fi \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
;fi

###########################################################################
# xDebug:
###########################################################################

ARG INSTALL_XDEBUG=false

RUN if [ ${INSTALL_XDEBUG} = true ]; then \
  # Install the xdebug extension
  if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
    pecl install xdebug-2.5.5; \
  else \
    pecl install xdebug-2.9.8; \
  fi && \
  docker-php-ext-enable xdebug \
;fi

ADD ./ext-xdebug.ini /usr/local/etc/php/conf.d/zz-xdebug.ini

###########################################################################
# Opcache:
###########################################################################

ARG INSTALL_OPCACHE=false

RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi

###########################################################################
# Apcu:
###########################################################################

ARG INSTALL_APCU=false

RUN if [ ${INSTALL_APCU} = true ]; then \
    pecl install apcu \
    && docker-php-ext-enable apcu \
;fi

# Requerido
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

RUN docker-php-ext-install pdo_mysql mysqli
RUN docker-php-ext-install mbstring zip soap

# Extensoes
ADD ./ext-opcache.ini /usr/local/etc/php/conf.d/zz-opcache.ini
ADD ./ext-apcu.ini /usr/local/etc/php/conf.d/zz-apcu.ini

# PHP.ini
COPY ./loja.ini /usr/local/etc/php/conf.d
#COPY ./loja.pool.conf /usr/local/etc/php-fpm.d/

USER root

# Configure non-root user.
ARG PUID=1000
ARG PGID=1000

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

WORKDIR "/var/www"

CMD ["php-fpm"]

EXPOSE 9000
