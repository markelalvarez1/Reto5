<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['locale'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('inicio');

    // PRODUCTOS------------------------------------
    // Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
    Route::resource('products', ProductController::class);
    Route::post('/products/kill/{product}', [ProductController::class, 'kill'])->name('products.kill');
    Route::get('/products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    // CONTACTO-------------------------------------
    // miweb.com/es/contacto
    Route::get('contacto', [ContactController::class, 'index'])->name('contact');

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ADMIN ZONE
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin');

    Route::get('/setLocale/{idioma}', [App\Http\Controllers\LocaleController::class, 'setLocale'])->name('setLocale');
});
