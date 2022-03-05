<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponCodeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\Province;
use App\Models\Category;
use App\Models\Place;
use App\Models\Languaje;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ExperienceController::class,'index'])->name('experiencies.index')->middleware('web');


Route::get('/explora',[GuestController::class,'index'])->name('experiencies.shop');
Route::get('/explora/buscar', [ProductController::class,'search'])->name('experiencies.product_shop');
Route::get('/explora/categoria/{category:slug}', [ProductController::class,'searchByCategory'])->name('experiencies.by.category');
Route::get('/explora/lugar/{place}', [ProductController::class,'searchByPlace'])->name('experiencies.by.place');

Route::get('/experiencia/{experience}', [GuestController::class,'showExperience'])->name('guest.product');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/experiencias/welcome', 'welcome');


require __DIR__.'/admin.php';
require __DIR__.'/host.php';
require __DIR__.'/guest.php';
