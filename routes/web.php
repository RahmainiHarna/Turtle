<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PageController;
use App\Models\Booking;
use GuzzleHttp\Psr7\Message;
use App\Http\Controllers\InvoiceController;

// Halaman utama -> halaman yang dapat diaskes oleh semua user, admin bahkan user yang tidak memiliki akun
Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/message', [MessageController::class, 'message'])->name('message.store');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

// Auth
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/redirect', [RoleController::class, 'redirectUser'])->middleware('auth');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // halaman dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // halaman daftar akun
    Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
    // halaman daftar menu
    Route::get('/menuAdmin', [AdminController::class, 'menuAdmin'])->name('menuAdmin');
    Route::get('/menu/create', [CartController::class, 'create'])->name('admin.createmenu');
    Route::post('/menu/store', [CartController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [CartController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [CartController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [CartController::class, 'destroy'])->name('menu.destroy');
    // halaman daftar pesanan
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::put('/message/{id}/update', [MessageController::class, 'update'])->name('message.update');
    // halaman daftar testimoni
    Route::get('/testimonialsAdmin', [AdminController::class, 'testimonialsAdmin'])->name('testimonialsAdmin');
    Route::put('/admin/testimoni/{id}/approve', [AdminController::class, 'approve'])->name('admin.testimoni.approve');
    // halaman daftar booking
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [AdminController::class, 'showOrder'])->name('admin.ordershow');
    Route::delete('/admin/order/{id}', [BookingController::class, 'destroy'])->name('admin.orderdelete');
});


// halaman yang hanya bisa dikases oleh user yang memiliki akun
Route::middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/book-a-table', [PageController::class, 'booking'])->name('book-a-table');
    Route::post('/booking', [BookingController::class, 'store'])->name('book.store');
    Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check.availability');

    Route::get('/fully-booked-dates', [BookingController::class, 'getFullyBookedDates'])->name('book.fullybooked');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/invoice', [InvoiceController::class, 'showFromSession'])->name('invoice.show');
    Route::post('/invoice/confirm', [InvoiceController::class, 'confirm'])->name('invoice.confirm');
    Route::get('/testimonials', [PageController::class, 'testimoni'])->name('testimonials');
    Route::post('/send-testimoni', [MessageController::class, 'testimoni'])->name('testimoni.store');

});


