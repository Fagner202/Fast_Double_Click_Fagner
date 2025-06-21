FROM php:8.2-apache

# Ativa mod_rewrite do Apache
RUN a2enmod rewrite

# Configura a raiz do servidor para /var/www/html (padrão)
WORKDIR /var/www/html

# Instalação de extensões PHP caso queira (ex: curl, json etc)
RUN docker-php-ext-install pdo pdo_mysql

# Copia vhost.conf e ativa (se desejar)
# COPY vhost.conf /etc/apache2/sites-available/000-default.conf
