# استخدم صورة PHP مع FPM و Composer
FROM php:8.2-fpm

# تثبيت مكتبات PHP اللازمة
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# نسخ Composer من الصورة الرسمية
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تعيين مجلد العمل
WORKDIR /var/www/html

# نسخ كل ملفات المشروع
COPY . .

# تثبيت مكتبات PHP المطلوبة للـ Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تثبيت dependencies باستخدام Composer
RUN composer install --optimize-autoloader --no-dev

# نسخ .env (تأكد أنك أعددت Environment Variables على Render)
COPY .env .env

# توليد مفتاح التطبيق
RUN php artisan key:generate

# تشغيل Laravel على المنفذ المحدد
CMD php artisan serve --host=0.0.0.0 --port=$PORT
