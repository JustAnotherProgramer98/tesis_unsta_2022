<?php


use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\Experience;
use App\Models\Province;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\Languaje;
use App\Models\User;
use App\Models\Comment;
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

Route::get('/',[ExperienceController::class,'index'])->name('experiencies.index')->middleware('web');;


Route::get('/explora',[GuestController::class,'index'])->name('experiencies.shop');
Route::get('/explora/buscar', [ProductController::class,'search'])->name('experiencies.product_shop');
Route::get('/experiencia/{experience}', [GuestController::class,'showExperience'])->name('guest.product');


Route::get('/cart_shop', function () {
    $experiences = App\Models\Experience::all();
    return view('guest.cart_shop', compact(["experiences"]));
});

Route::get('/contact_us', function () {
    $experiences = App\Models\Experience::all();
    return view('guest.contact_us', compact(["experiences"]));
})->name('contact_us');

//Register 
Route::get('/register',[GuestController::class,'create'])->name('register')->middleware('web');
Route::post('/register',[GuestController::class,'store'])->name('register.post')->middleware('web');

//Editar informacion personal de los usuarios
Route::get('/edit/profile/{user:email}',[UsersController::class,'edit'])->name('edit.user')->middleware('web');

Route::middleware('auth')->get('/account', function () {
    $provinces=Province::all();
    $places=Place::where('status',1)->get();
    $categories=Category::where('status',1)->get();
    $languajes=Languaje::all();
    $user=Auth::User();
    
    return view('guest.account', compact(['provinces', 'places', 'categories', 'languajes', 'user']));
});

Route::middleware('auth')->get('/account_guest', function () {
    $provinces=Province::all();
    $places=Place::where('status',1)->get();
    $categories=Category::where('status',1)->get();
    $languajes=Languaje::all();
    $user=Auth::User();   
    return view('guest.account_guest', compact(['provinces', 'places', 'categories', 'languajes', 'user']));
})->name('guest.account_guest');

Route::get('/test', function () {
    $experiences = App\Models\Experience::all();
    $category = App\Models\Category::all();
    $user = App\Models\User::all();
    return view('guest.test', compact(["experiences","category","user"]));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('experiencias/crear', 'admin.experiencies.create');
Route::view('/experiencias/welcome', 'welcome');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/panel-de-administracion',[AdminController::class,'index'])->name('admin.panel');
});

require __DIR__.'/admin.php';
require __DIR__.'/host.php';