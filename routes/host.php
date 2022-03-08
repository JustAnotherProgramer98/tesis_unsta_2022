<?php

use App\Http\Controllers\HostController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/host/mi-perfil',[HostController::class,'show'])->middleware('auth')->name('hosts.profile');
Route::post('/host/experience/store', [HostController::class, 'store'])->middleware('auth')->name('host.experiencies.store');
//show user info
Route::get('/user/{user:id}',[UsersController::class,'show_profile'])->name('user.detail')->middleware('web');
