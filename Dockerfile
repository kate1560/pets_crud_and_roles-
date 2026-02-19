FROM php:8.4-fpm


RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpng-dev \
    libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite gd

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node (para Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html
COPY . .

RUN chmod +x docker/entrypoint.sh

CMD ["sh", "docker/entrypoint.sh"]
