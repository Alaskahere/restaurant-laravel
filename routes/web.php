<?php

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas accesibles por cualquier usuario
Route::get('/menu', [DishController::class, 'index'])->name('menu.index');
Route::resource('ordenes', OrderController::class)->only(['create', 'store']);

// Ruta del panel de control (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
// Rutas de categorías
Route::resource('categories', CategoryController::class);

// Rutas de órdenes
Route::resource('orders', OrderController::class);
Route::post('orders/{order}/completar', [OrderController::class, 'completar'])->name('orders.completar');

// Rutas de platos (dishes)
Route::resource('dishes', DishController::class);

// Rutas de mesas (tables)
Route::resource('tables', TableController::class);



// require __DIR__.'/auth.php';
