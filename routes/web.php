<?php

declare(strict_types=1);

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Перевірка стану вебзастосунку
Route::get('/health', function () {
    return response()->json([
        'status' => 'OK',
        'timestamp' => now(),
    ]);
})->name('health');

// Група маршрутів для товарів
Route::prefix('products')->name('products.')->group(function () {

    // Отримання всіх товарів
    Route::get('/', [ProductController::class, 'index'])
        ->name('index');

    // Створення нового товару із перевіркою доступу
    Route::post('/', [ProductController::class, 'store'])
        ->middleware('product.access')
        ->name('store');

    // Отримання товару за ID
    Route::get('/{id}', [ProductController::class, 'show'])
        ->whereNumber('id')
        ->name('show');
});

// Перегляд кошика покупця
Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');
