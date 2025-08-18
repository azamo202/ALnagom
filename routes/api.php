<?php
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController as UserProductController;
// Admin Auth Routes
Route::prefix('admin/auth')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// User Auth Routes
Route::prefix('user/auth')->group(function () {
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::post('/login', [UserAuthController::class, 'login']);
});

// Protected Routes (both admin and user)
Route::middleware('auth:sanctum')->group(function () {
    // User routes
    Route::middleware('user')->group(function () {
        Route::get('/user/dashboard', function () {
            return response()->json(['message' => 'مرحبا أيها المستخدم']);
        });
    });

    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', [AdminAuthController::class, 'index']);
    });
});


Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('products', ProductController::class);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\Admin\CategoryController::class);
});



Route::middleware(['auth:sanctum', 'user'])->group(function () {
    Route::get('/cart', [CartController::class, 'index']); // عرض السلة
    Route::post('/cart/add/{product}', [CartController::class, 'store']); // إضافة منتج
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'destroy']); // حذف منتج
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/checkout', [OrderController::class, 'checkout']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);       // جميع المنتجات
    Route::get('/{product}', [ProductController::class, 'show']); // تفاصيل منتج محدد
});