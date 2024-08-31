# Usa la imagen base oficial de PHP con Apache
FROM php:7.4-apache

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli
