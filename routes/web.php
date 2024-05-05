<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Visitor::recordVisit(); // record visitors
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Routes

Route::get('user/home',[UserController::class,'home'])
    ->middleware('auth')->name('user.home');
Route::get('user/shop',[UserController::class,'shop'])
    ->middleware('auth')->name('user.shop');
Route::get('user/order',[UserController::class,'order'])
    ->middleware('auth')->name('user.order');
Route::get('user/editorial',[UserController::class,'editorial'])
    ->middleware('auth')->name('user.editorial');
Route::get('user/about-us',[UserController::class,'aboutUs'])
    ->middleware('auth')->name('user.aboutUs');
Route::get('user/cart',[UserController::class,'Cart'])
    ->middleware('auth')->name('user.cart');
Route::get('user/orders/get-by-status/{status}', [UserController::class, 'get_by_status'])
    ->name('user.orders.get-by-status');


//Route::match(['get', 'post'], 'user/add-to-cart/{product_id}', [UserController::class, 'addProductToCart'])->name('cart.add');
Route::post('user/add-to-cart',[UserController::class,'addProductToCart'])
    ->middleware('auth')->name('cart.add');



Route::get('user/orders/{order}/{status}', [UserController::class, 'order_update'])
    ->name('user.orders.order-update');
Route::delete('/cart/{id}', [UserController::class, 'remove'])->name('cart.remove');
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/seller.php';
