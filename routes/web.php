<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('frontend.userfront.about_us');
});
Route::get('/contact', function () {
    return view('frontend.userfront.contact');
});

Route::get('/brands', function () {
    return view('frontend.userfront.brands');
});

Route::get('/cart', function () {
    return view('frontend.userfront.cart');
});

Route::get('/add/order', function () {
    return view('frontend.userfront.add_order');
});

Route::get('/orders', function () {
    return view('frontend.userfront.orders');
});

Route::get('/user/profile', function () {
    return view('frontend.userfront.userprofile');
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
