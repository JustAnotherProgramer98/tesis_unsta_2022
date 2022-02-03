<?php


use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ExperienceController::class,'index'])->name('experiencies.index');


Route::get('/shop', function () {
    $category = App\Models\Category::all();
    $places = App\Models\Place::all();
    $experiences = App\Models\Experience::all();
    return view('guest.shop',compact(["experiences",'category',"places"]));
});

Route::get('/product/{experience}', function (App\Models\Experience $experience) {
    $experiences = App\Models\Experience::all();
    
    return view('guest.product', compact(["experiences", 'experience']));
})->name('guest.product');

Route::get('/cart_shop', function () {
    $experiences = App\Models\Experience::all();
    return view('guest.cart_shop', compact(["experiences"]));
});

Route::get('/product_shop', function () {
    $experiences = App\Models\Experience::all();

    return view('guest.product_shop', compact(["experiences"]));
});

Route::get('/account', function () {
    $experiences = App\Models\Experience::all();
    
    return view('guest.account', compact(["experiences"]));
});

Route::get('/test', function () {
    $experiences = App\Models\Experience::all();
    $category = App\Models\Category::all();
    return view('guest.test', compact(["experiences"]), compact(["category"]));
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
