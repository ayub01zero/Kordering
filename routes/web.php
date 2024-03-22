<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProfileController;

//about routes
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [ContactController::class, 'index'])->name('about.us');

Route::middleware('auth')->group(function () {
//profile routes
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.updatee');
Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');

//logout routes
Route::get('/logout/auth', [ProfileController::class, 'logout'])->name('logout.auth');

});


Route::get('/', function () {
    $items = App\Models\Brands::all();
    return view('dashboard', compact('items'));
})->name('dashboard');


Route::get('/brands', function () {
    $items = App\Models\Brands::all();
    return view('frontend.userfront.brands', compact('items'));

});







Route::get('/contact', function () {
    return view('frontend.userfront.contact');
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




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
