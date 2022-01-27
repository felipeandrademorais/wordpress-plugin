FROM wordpress
RUN echo 'php_value upload_max_filesize 256M' > '/var/www/html/.htaccess'
RUN echo 'php_value post_max_size 13M' > '/var/www/html/.htaccess'
RUN echo 'php_value memory_limit 15M' > '/var/www/html/.htaccess'
RUN chown -R www-data:www-data /var/www/html/