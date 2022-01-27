<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExperienceController;
use App\Models\Experience;
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
// Route::get('/', function () {
//     $experiences = App\Models\Experience::all();
//     $users = App\Models\User::all();
//     $places = App\Models\Place::all();
//     return view('guest.index', compact(["experiences"]), compact(["users"]));
// });

Route::get('/shop', function () {
    $category = App\Models\Category::all();
    $places = App\Models\Place::all();
    return view('guest.shop', compact(["category"]), compact(["places"]));
});

Route::get('/product', function () {
    $experiences = App\Models\Experience::all();
    $users = App\Models\User::all();
    $places = App\Models\Place::all();
    return view('guest.product', compact(["experiences"]), compact(["users"]));
});

Route::get('/cart_shop', function () {
    $experiences = App\Models\Experience::all();
    $users = App\Models\User::all();
    $places = App\Models\Place::all();
    return view('guest.cart_shop', compact(["experiences"]), compact(["users"]));
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
