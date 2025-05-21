<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Models\Booking;
use GuzzleHttp\Psr7\Message;

// Route::get('/', function () {
//     return view('welcome');
// });


// Halaman utama
Route::get('/', function () {
    return view('pages.home');
});

// Auth
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Dashboard (pakai controller + middleware)
Route::get('/admin', [AdminController::class, 'index']);

// Booking
// Route::get('/booking', [BookingController::class, 'index']); // Bisa diaktifkan jika ada
Route::post('/booking', [BookingController::class, 'store'])->name('book.store');

// Menu & Pemesanan
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart']);
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
Route::get('/invoice', [CartController::class, 'invoice'])->name('invoice');
Route::post('/confirm', [CartController::class, 'confirm']);


// Halaman Baru
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/book-a-table', [PageController::class, 'booking'])->name('book-a-table');
Route::get('/testimonials', [PageController::class, 'testimoni'])->name('testimonials');

// message
Route::post('/message', [MessageController::class, 'message'])->name('message.store');

// testimoni
Route::post('/send-testimoni', [MessageController::class, 'testimoni'])->name('testimoni.store');


