<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/panel-de-administracion',[AdminController::class,'index'])->name('admin.panel');

    //Experiencies
    Route::get('/experiencias',[ExperienceController::class,'index'])->name('experiencies.index.admin');
    Route::get('/experiencias/{experience}/',[ExperienceController::class,'show'])->name('experiencie.show.admin');
    Route::post('/experiencias/store',[ExperienceController::class,'store'])->name('experiencies.store.admin');
    Route::get('/experiencias/{experience}/edit',[ExperienceController::class,'edit'])->name('experiencies.edit.admin');
    Route::put('/experiencias/{experience}/update',[ExperienceController::class,'update'])->name('experiencies.update.admin');
    Route::delete('/experiencias/delete',[ExperienceController::class,'destroy'])->name('experiencies.destroy.admin');

    //Places
    Route::get('/places',[PlaceController::class,'index'])->name('places.index.admin');
    Route::post('/places/store',[PlaceController::class,'store'])->name('places.store.admin');
    Route::get('/places/{place}/edit',[PlaceController::class,'edit'])->name('places.edit.admin');
    Route::put('/places/{place}/update',[PlaceController::class,'update'])->name('places.update.admin');
    Route::delete('/places/delete',[PlaceController::class,'destroy'])->name('places.destroy.admin');

});