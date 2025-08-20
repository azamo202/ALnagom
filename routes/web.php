<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Booking;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// صفحات المنتجات
Route::prefix('products')->group(function () {
    Route::get('/cars', function () {
        return view('pages.cars-pages');
    })->name('cars');

    Route::get('/flower', function () {
        return view('pages.flower-pages');
    })->name('flower');

    Route::get('/printers', function () {
        return view('pages.printer-pages');
    })->name('printers');

    Route::get('/wedding', function () {
        return view('pages.wedding-pages');
    })->name('wedding');

    Route::get('/product/{id}', function ($id) {
        return view('pages.products-pages', ['id' => $id]);
    })->name('products');
});

// صفحة خاصة (zain)
Route::get('/zain', function () {
    return view('zaino');
})->name('zain');

// نظام الحجوزات
Route::middleware('auth')->group(function () {
    Route::get('/booking/{productId}', Booking::class)->name('booking.form');
});

// لوحة التحكم للمستخدم العادي
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// إدارة الملف الشخصي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// لوحة التحكم للإدارة
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // يمكن إضافة مسارات الإدارة الأخرى هنا
});

// ملفات المصادقة
require __DIR__ . '/auth.php';
