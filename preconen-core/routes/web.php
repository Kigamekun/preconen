<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ForecastController,ComodityController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forecast',[ForecastController::class,'index']);
Route::get('/scratch',[ForecastController::class,'scratch']);


Route::prefix('comodity')->group(function () {
    Route::get('/', [ComodityController::class,'index'])->name('comodity.index');
    Route::get('/create', [ComodityController::class,'create'])->name('comodity.create');
    Route::post('/store', [ComodityController::class,'store'])->name('comodity.store');
    Route::get('/edit/{id}', [ComodityController::class,'edit'])->name('comodity.edit');
    Route::patch('/update/{id}', [ComodityController::class,'update'])->name('comodity.update');
    Route::delete('/delete/{id}', [ComodityController::class,'destroy'])->name('comodity.delete');
    Route::get('/download/{id}', [ComodityController::class,'download'])->name('comodity.download');
});


Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class,'index'])->name('product.index');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::patch('/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');
    Route::get('/download/{id}', [ProductController::class,'download'])->name('product.download');
});

require __DIR__.'/auth.php';
