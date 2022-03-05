<?php

use App\Http\Controllers\HostController;
use Illuminate\Support\Facades\Route;

Route::get('/host/mi-perfil',[HostController::class,'show'])->middleware('auth')->name('hosts.profile');
Route::post('/host/experience/store', [HostController::class, 'store'])->middleware('auth')->name('host.experiencies.store');
//show user info
Route::get('/user/{user:id}',[UsersController::class,'show'])->name('user.detail')->middleware('web');
