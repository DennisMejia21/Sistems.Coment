FROM php:8.2-apache

# Instalar las extensiones necesarias para conectar PHP con MySQL (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar el módulo de reescritura de Apache (útil para APIs de React)
RUN a2enmod rewrite

# Cambiar los permisos para que Apache pueda leer tus archivos de desarrollo
RUN chown -R www-data:www-data /var/www/html