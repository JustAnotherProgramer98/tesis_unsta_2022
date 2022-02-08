<?php

use App\Http\Controllers\HostController;
use Illuminate\Support\Facades\Route;

Route::get('/host/{user}',[HostController::class,'index'])->middleware('auth')->name('hosts.index');
Route::post('/host/experience/store', [HostController::class, 'store'])->middleware('auth')->name('host.experiencies.store');
