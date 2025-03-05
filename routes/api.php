<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPricingController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RentalPeriodController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::name('products')->group(function() {
        Route::get('/products', [ProductController::class, 'productListing']);
        Route::get('/products/{id}', [ProductController::class, 'show']);
        Route::post('/products', [ProductController::class, 'store']);
    });

    Route::name('regions')->group(function() {
        Route::get('/regions', [RegionController::class, 'index']);
        Route::get('/regions/{id}', [RegionController::class, 'show']);
        Route::post('/regions', [RegionController::class, 'store']);
        Route::patch('/regions/{id}', [RegionController::class, 'update']);
    });

    Route::name('attributes')->group(function() {
        Route::get('/attributes', [AttributeController::class, 'index']);
        Route::get('/attributes/{id}', [AttributeController::class, 'show']);
        Route::post('/attributes', [AttributeController::class, 'store']);
        Route::patch('/attributes/{id}', [AttributeController::class, 'update']);
    });

    /** Rental period routes */
    Route::name('rental-periods')->group(function() {
        Route::get('/rental-periods', [RentalPeriodController::class, 'index']);
        Route::get('/rental-periods/{id}', [RentalPeriodController::class, 'show']);
        Route::post('/rental-periods', [RentalPeriodController::class, 'store']);
        Route::patch('/rental-periods/{id}', [RentalPeriodController::class, 'update']);
    });


    /** Product pricing routes */
    Route::name('product-pricings')->group(function() {
        Route::post('/products/{product}/pricings', [ProductPricingController::class, 'store']);
    });
});
