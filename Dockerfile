# استخدم صورة PHP مع FPM
FROM php:8.2-fpm

# تثبيت مكتبات النظام المطلوبة
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libicu-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# تثبيت امتدادات PHP المطلوبة
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# نسخ Composer من الصورة الرسمية
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تعيين مجلد العمل
WORKDIR /var/www/html


# تثبيت dependencies باستخدام Composer
RUN composer install --optimize-autoloader --no-dev

# توليد مفتاح التطبيق (يمكنك تعيين APP_KEY في Render لتجنب توليده هنا)
RUN php artisan key:generate

# تشغيل Laravel على المنفذ المحدد
CMD php artisan serve --host=0.0.0.0 --port=$PORT
