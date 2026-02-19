#!/bin/sh

echo "🚀 Starting Laravel setup..."

# Instalar dependencias si no existen
if [ ! -d "vendor" ]; then
    composer install
fi

# Instalar dependencias de frontend si no existen
if [ ! -d "node_modules" ]; then
    npm install
fi

# Generar APP_KEY si no existe
php artisan key:generate --force

# Ejecutar migraciones (opcional)
php artisan migrate --force

echo "✅ Laravel listo"

# 🔥 ESTE ES EL PASO CLAVE
php-fpm
