# Use an official PHP image
FROM php:8.0-apache

# Install cURL (required for the client)
RUN apt-get update && apt-get install -y curl


# Copy project files to the container
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html
