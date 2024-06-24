<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;

//about routes
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [ContactController::class, 'index'])->name('about.us');





Route::middleware('auth')->group(function () {
//profile routes
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.updatee');
Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');

//logout routes
Route::get('/logout/auth', [ProfileController::class, 'logout'])->name('logout.auth');

//addcart
Route::post('/add/to/cart', [CartController::class, 'AddToCart'])->name('Add.Cart');
Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/process/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');

// all orders
Route::get('/orders', [OrderController::class, 'fetchOrders'])->name('orders.all');

//change dolar
Route::post('/convert', [OrderController::class, 'convertCurrency'])->name('convert.currency');

Route::get('/cart', function () {
    return view('frontend.userfront.cart');
});

Route::get('/add/order', function () {
    return view('frontend.userfront.add_order');
})->name('add.order');

});






Route::get('/about', [ContactController::class, 'index'])->name('about.us');

Route::get('/', function () {
    $items = App\Models\Brands::all();
    return view('dashboard', compact('items'));
})->name('dashboard');


Route::get('/brands', function () {
    $items = App\Models\Brands::all();
    return view('frontend.userfront.brands', compact('items'));

});












// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
