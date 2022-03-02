<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponCodeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
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


//Contact us
Route::get('/contactanos', [GuestController::class,'createContact'])->name('contact_us');
Route::post('/contactanos',[GuestController::class,'storeContact'])->name('contact_us.store');


//Register 
Route::get('/register',[GuestController::class,'create'])->name('register')->middleware('web');
Route::post('/register',[GuestController::class,'store'])->name('register.post')->middleware('web');

//Store experience on cart
Route::post('/add-to-cart',[CartController::class,'store'])->name('cart.post')->middleware('web');

//Delete experience from cart
Route::post('/remove-experiencie',[CartController::class,'destroy'])->name('cart.delete')->middleware('web');

//Index cart 
Route::get('/experiencias-a-comprar',[CartController::class,'index'])->name('cart.index')->middleware('web');

//Use CouponCode cart 
Route::post('/couppon-use',[CouponCodeController::class,'use_coupon'])->name('couppon.use')->middleware(['web','auth']);


//Edit personal information from user
Route::get('/edit/profile/{user:email}',[UsersController::class,'edit'])->name('edit.user')->middleware('web');
Route::put('/edit/profile/',[UsersController::class,'update'])->name('update.user')->middleware('web');




Route::middleware('auth')->get('/account', function () {
    $provinces=Province::all();
    $places=Place::where('status',1)->get();
    $categories=Category::where('status',1)->get();
    $languajes=Languaje::all();
    $user=Auth::User();
    
    return view('guest.account', compact(['provinces', 'places', 'categories', 'languajes', 'user']));
});

Route::get('/user/{user:id}',[UsersController::class,'show'])->name('user.detail')->middleware('web');


Route::get('/test', function () {
    $experiences = App\Models\Experience::all();
    $category = App\Models\Category::all();
    $user = App\Models\User::all();
    return view('guest.test', compact(["experiences","category","user"]));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/experiencias/welcome', 'welcome');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/panel-de-administracion',[AdminController::class,'index'])->name('admin.panel');
});

require __DIR__.'/admin.php';
require __DIR__.'/host.php';