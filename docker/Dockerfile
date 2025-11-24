# docker/Dockerfile
FROM php:8.3-apache

# Install system deps for pdo_pgsql, zip, git
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    vim \
  && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working dir
WORKDIR /var/www/html

# Ensure Apache serves public/
RUN sed -i "s|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|" /etc/apache2/sites-available/000-default.conf
RUN sed -i "/<Directory \/var\/www\/html>/c\<Directory /var/www/html/public>" /etc/apache2/sites-available/000-default.conf

# Copy project into image (for production build)
# In dev we'll usually mount the source, but copy as fallback
COPY .. /var/www/html

# Set permissions for www-data
RUN chown -R www-data:www-data /var/www/html

# Expose port (not strictly necessary in compose)
EXPOSE 80

CMD ["apache2-foreground"]