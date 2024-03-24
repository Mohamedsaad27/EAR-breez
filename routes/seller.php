<?php

use App\Http\Controllers\Seller\AuthenticatedSessionController;
use App\Http\Controllers\Seller\RegisteredUserController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;


// Auth Routes //////////////////////////////
Route::get('seller/dashboard',[SellerController::class,'viewDashboard'])->middleware(['auth:seller'])->name('seller.Dashboard');

Route::get('/seller-register', [RegisteredUserController::class, 'create'])
    ->middleware('guest:seller')
    ->name('seller.register');

Route::post('/seller-register', [RegisteredUserController::class, 'store'])
    ->middleware('guest:seller');

Route::get('/seller-login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest:seller')
    ->name('seller.login');

Route::post('/seller-login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest:seller');

Route::post('/seller-logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('seller.logout')
    ->middleware('auth:seller');
////////////////////////////////////////////////////
Route::group(['middleware' => 'auth:seller', 'prefix' => 'seller'],function (){
    Route::get('/order',[SellerController::class,'viewOrderPage'])->name('seller.orderPage');
    Route::get('/seller/productslist',[SellerController::class,'viewProductListPage'])->name('seller.productListPage');
    Route::get('/addnewproduct',[SellerController::class,'addNewProduct'])->name('seller.addNewProduct');
    Route::get('/adminpage',[SellerController::class,'editBusinessInformation'])->name('seller.editBusinessInformation');
    Route::get('/transactionhistory',[SellerController::class,'viewTransactionHistory'])->name('seller.viewTransactionHistory');
    Route::get('/contactus',[SellerController::class,'viewContactUsPage'])->name('seller.viewContactUsPage');
});