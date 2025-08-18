<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Livewire\Booking;



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');  // لازم تنشئ ملف view في resources/views/admin/dashboard.blade.php
    })->name('dashboard');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// المسار الرئيسي
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cars', function () {
    return view('pages.cars-pages');
})->name('cars');


Route::get('/booking/{productId}', Booking::class)
    ->middleware('auth')
    ->name('booking.form');

    Route::get('/flower', function () {
    return view('pages.flower-pages');
})->name('flower');

    Route::get('/printers', function () {
    return view('pages.printer-pages');
})->name('printers');

 Route::get('/wedding', function () {
    return view('pages.wedding-pages');
})->name('wedding');

 Route::get('/zain', function () {
    return view('pages.zain-pages');
})->name('zain');

Route::get('/product/{id}', function ($id) {
    return view('pages.products-pages', ['id' => $id]);
})->name('products');





