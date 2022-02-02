<?php

use App\Http\Controllers\HostController;
use Illuminate\Support\Facades\Route;

Route::get('/host/{user:email}',[HostController::class,'index'])->middleware('auth')->name('hosts.index');
