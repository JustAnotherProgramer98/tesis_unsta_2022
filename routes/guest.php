<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponCodeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


//Contact us
Route::get('/contactanos', [GuestController::class,'createContact'])->name('contact_us');
Route::post('/contactanos',[GuestController::class,'storeContact'])->name('contact_us.store');


//Register 
Route::get('/register',[GuestController::class,'create'])->name('register')->middleware('web');
Route::post('/register',[GuestController::class,'store'])->name('register.post')->middleware('web');

//Edit personal information from user
Route::get('/edit/profile/{user:email}',[UsersController::class,'edit'])->name('edit.user')->middleware('web');
Route::put('/update/profile/{user}',[UsersController::class,'update'])->name('update.user')->middleware('web');

//Store experience on cart
Route::post('/add-to-cart',[CartController::class,'store'])->name('cart.post')->middleware('web');

//Delete experience from cart
Route::post('/remove-experiencie',[CartController::class,'destroy'])->name('cart.delete')->middleware('web');

//Index cart 
Route::get('/experiencias-a-comprar',[CartController::class,'index'])->name('cart.index')->middleware('web');
Route::post('/comprar/{experience}',[SaleController::class,'store'])->name('cart.buy')->middleware('web');


//Use CouponCode cart 
Route::post('/couppon-use',[CouponCodeController::class,'use_coupon'])->name('couppon.use')->middleware(['web','auth']);
//Use CouponCode cart 
Route::post('/couppon-use',[CouponCodeController::class,'use_coupon'])->name('couppon.use')->middleware(['web','auth']);

Route::post('/finish-experience',[SaleController::class,'aprove'])->name('sale.aprove')->middleware(['web','auth']);
Route::post('/comment-experience',[SaleController::class,'comment_experiencie'])->name('sale.experiencie.comment')->middleware(['web','auth']);

//Cases while paying 
Route::get('/compra/aprobada' ,[SaleController::class,'sale_success'])->name('sale.success');
Route::get('/compra/rechazada',[SaleController::class,'sale_failed'])->name('sale.failed');
Route::get('/compra/en-espera',[SaleController::class,'sale_waiting'])->name('sale.waiting');
