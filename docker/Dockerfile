FROM ubuntu:16.04
LABEL maintainer="xpacer <claude.xpacer@gmail.com>"

RUN echo 'This is a test Phalcon environment'

RUN apt-get update && apt-get upgrade -y
RUN apt-get -y install \
    bzip2 \
    freetds-dev \
    git \
    libfontconfig \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libldap2-dev \
    libmcrypt-dev \
    libmysqlclient-dev \
    libpng12-dev \
    libpq-dev \
    libwebp-dev \
    libxml2-dev \
    zlib1g-dev \
    zip \
    vim \
    wget \
    unzip \
    curl \
    cron \
    apache2

RUN apt-get -y install python-software-properties \
    software-properties-common

RUN add-apt-repository ppa:fkrull/deadsnakes
RUN apt-get -y update

RUN apt-get install -y python2.7
RUN apt-get install -y python-pip
RUN pip install --upgrade pip


RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-key E5267A6C && \
    LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php && \
    apt-get update

RUN apt-get -y install libapache2-mod-php5.6

RUN apt-get -y --allow-unauthenticated --fix-missing install \
    php5.6 \
    php5.6-cgi \
    php5.6-cli \
    php5.6-common \
    php5.6-curl \
    php5.6-dev \
    php5.6-gd \
    php5.6-gmp \
    php5.6-json \
    php5.6-ldap \
    php5.6-mysql \
    php5.6-odbc \
    php5.6-opcache \
    php5.6-pspell \
    php5.6-readline \
    php5.6-sqlite3 \
    php5.6-tidy \
    php5.6-xmlrpc \
    php5.6-xsl \
    php5.6-fpm \
    php5.6-intl \
    php5.6-mcrypt \
    php5.6-mbstring \
    php5.6-zip \
    php-xdebug \
    php5.6-redis \
    php5.6-soap \
    php5.6-sockets \
    php5.6-bcmath

RUN cd /tmp && \
    git clone --depth=1 --branch v3.1.2 "git://github.com/phalcon/cphalcon.git" && \
    cd cphalcon/build && \
    ./install && \
    echo "extension=phalcon.so" > /etc/php/5.6/mods-available/phalcon.ini

RUN ln -sf /etc/php/5.6/mods-available/phalcon.ini /etc/php/5.6/apache2/conf.d/20-phalcon.ini
RUN ln -sf /etc/php/5.6/mods-available/phalcon.ini /etc/php/5.6/cli/conf.d/20-phalcon.ini
RUN ln -sf /etc/php/5.6/mods-available/phalcon.ini /etc/php/5.6/fpm/conf.d/20-phalcon.ini

# Download and install Composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php &&\
    mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer

RUN echo "zend_extension=xdebug.so" > /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.idekey='PHPSTORM'" >> /etc/php/5.6/mods-available/xdebug.ini \
    && echo "xdebug.remote_connect_back=0" >> /etc/php/5.6/mods-available/xdebug.ini

RUN apt-get -y --allow-unauthenticated --fix-missing install php-mongodb

RUN a2enconf php5.6-fpm
RUN a2enmod rewrite

COPY run.sh /usr/local/bin/run.sh
RUN chmod +x /usr/local/bin/run.sh

WORKDIR /var/www

EXPOSE 80

CMD ["/usr/local/bin/run.sh"]