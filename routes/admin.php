<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SaleController;
use App\Models\Category;
use App\Models\Experience;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/panel-de-administracion', [AdminController::class, 'index'])->name('admin.panel');

    
    //Experiencies
    Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiencies.index.admin');

    Route::get('/experiences/category/assing', function () {
        $experiences=Experience::all();
        $categories=Category::all();
        return view('admin.experiencies.assing_category',compact(['experiences','categories']));
    })->name('experiencies.assing.admin');

    Route::get('/experiences/{experience}/', [ExperienceController::class, 'show'])->name('experiencie.show.admin');
    Route::post('/experiences/store', [ExperienceController::class, 'store'])->name('experiencies.store.admin');
    Route::post('/experiences/approve', [ExperienceController::class, 'approveExperience'])->name('experiencies.approve.admin');
    Route::post('/experiences/assing/category', [ExperienceController::class, 'assignCategoryExperiencie'])->name('experiencies.assing.category.admin');
    Route::get('/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('experiencies.edit.admin');
    Route::put('/experiences/{experience}/update', [ExperienceController::class, 'update'])->name('experiencies.update.admin');
    Route::delete('/experiences/delete', [ExperienceController::class, 'destroy'])->name('experiencies.destroy.admin');
    Route::get('/search/experiences', [ExperienceController::class, 'search'])->name('experience.search');

    //Places
    Route::get('/places', [PlaceController::class, 'index'])->name('places.index.admin');
    Route::get('/places/{place}/', [PlaceController::class, 'show'])->name('place.show.admin');
    Route::post('/places/store', [PlaceController::class, 'store'])->name('places.store.admin');
    Route::post('/places/approve', [PlaceController::class, 'approvePlace'])->name('places.approve.admin');
    Route::get('/places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit.admin');
    Route::put('/places/{place}/update', [PlaceController::class, 'update'])->name('places.update.admin');
    Route::delete('/places/delete', [PlaceController::class, 'destroy'])->name('places.destroy.admin');
    //Render cities by province
    Route::post('render/places-by-province', [PlaceController::class, 'renderPlacesByProvince'])->name('places.render.cities.admin');

    //Sales
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index.admin');
    Route::get('/sales/{sale}/', [SaleController::class, 'show'])->name('sale.show.admin');
    Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store.admin');
    Route::post('/sales/approve', [SaleController::class, 'approveExperience'])->name('sales.approve.admin');
    Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit.admin');
    Route::put('/sales/{sale}/update', [SaleController::class, 'update'])->name('sales.update.admin');
    Route::delete('/sales/delete', [SaleController::class, 'destroy'])->name('sales.destroy.admin');


     //Categories
     Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index.admin');
     Route::get('/categories/{category}/', [CategoryController::class, 'show'])->name('category.show.admin');
     Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store.admin');
     Route::post('/categories/approve', [CategoryController::class, 'approveCategory'])->name('categories.approve.admin');
     Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit.admin');
     Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update.admin');
     Route::delete('/categories/delete', [CategoryController::class, 'destroy'])->name('categories.destroy.admin');
});
