<?php

use App\Http\Controllers\BankTransferController;
use App\Http\Controllers\Seller\AuthenticatedSessionController;
use App\Http\Controllers\Seller\RegisteredUserController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;


// Auth Routes //////////////////////////////
Route::middleware('auth:seller')->group(function () {
    Route::get('seller/dashboard', [SellerController::class, 'viewDashboard'])->name('seller.Dashboard');
});
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
    Route::get('/add-business-information',[SellerController::class,'addBusinessInformation'])->name('seller.addBusinessInformation');
    Route::post('/store-business-information',[SellerController::class,'storeBusinessInformation'])->name('seller.storeBusinessInformation');
    Route::get('/adminpage/{seller}',[SellerController::class,'editBusinessInformation'])->name('seller.editBusinessInformation');
    Route::post('/edit-business-information/{seller}',[SellerController::class,'storeEditBusinessInformation'])->name('seller.storeEditBusinessInformation');
    Route::get('/order',[SellerController::class,'viewOrderPage'])->name('seller.orderPage');
    Route::get('/productslist',[SellerController::class,'viewProductListPage'])->name('seller.productListPage');
    Route::get('/addnewproduct',[SellerController::class,'addNewProduct'])->name('seller.addNewProduct');
    Route::get('/transactionhistory',[SellerController::class,'viewTransactionHistory'])->name('seller.viewTransactionHistory');
    Route::get('/contactus',[SellerController::class,'viewContactUsPage'])->name('seller.viewContactUsPage');
    Route::post('/store-new-product',[SellerController::class,'storeNewProduct'])->name('seller.storeNewProduct');
    Route::get('/edit-product/{product}',[SellerController::class,'viewEditProduct'])->name('seller.viewEditProduct');
    Route::post('/edit-product/{product}',[SellerController::class,'save_edited_product'])->name('seller.storeEditProduct');
    Route::post('/delete-product/{product}',[SellerController::class,'deleteProduct'])->name('seller.deleteProduct');
    Route::post('/save-contact-us-message',[SellerController::class,'sendContactMessage'])->name('seller.sendContactMessage');
    Route::post('/bank-account', [BankTransferController::class, 'store'])->name('bank-transfer.store');
});
