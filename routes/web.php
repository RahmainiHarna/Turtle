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

// Route::get('/', function () {
//     return view('welcome');
// });


// Halaman utama
Route::get('/', function () {
    return view('pages.home');
});
// message
Route::post('/message', [MessageController::class, 'message'])->name('message.store');
// lihat menu
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
    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');
    Route::get('/akun', [AdminController::class, 'akun'])->name('akun');
    Route::get('/menuAdmin', [AdminController::class, 'menuAdmin'])->name('menuAdmin');
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::put('/message/{id}', [MessageController::class, 'update'])->name('message.update');
    Route::get('/testimonialsAdmin', [AdminController::class, 'testimonialsAdmin'])->name('testimonialsAdmin');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
});


// Booking
Route::middleware(['auth', UserMiddleware::class])->group(function (){
// Route::get('/booking', [BookingController::class, 'index']); // Bisa diaktifkan jika ada
Route::post('/booking', [BookingController::class, 'store'])->name('book.store');

// Menu & Pemesanan
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart']);
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
Route::get('/invoice', [CartController::class, 'invoice'])->name('invoice');
Route::post('/confirm', [CartController::class, 'confirm']);


// Halaman Baru
Route::get('/book-a-table', [PageController::class, 'booking'])->name('book-a-table');
Route::get('/testimonials', [PageController::class, 'testimoni'])->name('testimonials');

// testimoni
Route::post('/send-testimoni', [MessageController::class, 'testimoni'])->name('testimoni.store');

//Invoice
Route::get('/invoice', [InvoiceController::class, 'index']);
});