<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,ForecastController,DashboardController,ProductController,ComodityController,LandController,PlantingPlanningController};

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
    return view('landing');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forecast', [ForecastController::class,'index']);
Route::get('/scratch', [ForecastController::class,'scratch']);


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.index');
    });
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
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('user.index');
        Route::get('/create', [UserController::class,'create'])->name('user.create');
        Route::post('/store', [UserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class,'edit'])->name('user.edit');
        Route::patch('/update/{id}', [UserController::class,'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class,'destroy'])->name('user.delete');
    });
    // Route::prefix('land')->group(function () {
    //     Route::get('/', [LandController::class,'index'])->name('land.index');
    //     Route::get('/create', [LandController::class,'create'])->name('land.create');
    //     Route::post('/store', [LandController::class,'store'])->name('land.store');
    //     Route::get('/edit/{id}', [LandController::class,'edit'])->name('land.edit');
    //     Route::patch('/update/{id}', [LandController::class,'update'])->name('land.update');
    //     Route::delete('/delete/{id}', [LandController::class,'destroy'])->name('land.delete');
    //     Route::get('/download/{id}', [LandController::class,'download'])->name('land.download');
    // });
});


Route::prefix('planting-planning')->group(function () {
    Route::get('/', [PlantingPlanningController::class,'index'])->name('planting-planning.index');
    Route::get('/create', [PlantingPlanningController::class,'create'])->name('planting-planning.create');
    Route::post('/store', [PlantingPlanningController::class,'store'])->name('planting-planning.store');
    Route::get('/edit/{id}', [PlantingPlanningController::class,'edit'])->name('planting-planning.edit');
    Route::patch('/update/{id}', [PlantingPlanningController::class,'update'])->name('planting-planning.update');
    Route::delete('/delete/{id}', [PlantingPlanningController::class,'destroy'])->name('planting-planning.delete');
    Route::get('/download/{id}', [PlantingPlanningController::class,'download'])->name('planting-planning.download');
});

Route::prefix('land')->group(function () {
    Route::get('/', [LandController::class,'index'])->name('land.index');
    Route::get('/{id}', [LandController::class,'detail'])->name('land.detail');
    Route::get('/create', [LandController::class,'create'])->name('land.create');
    Route::post('/store', [LandController::class,'store'])->name('land.store');
    Route::get('/edit/{id}', [LandController::class,'edit'])->name('land.edit');
    Route::patch('/update/{id}', [LandController::class,'update'])->name('land.update');
    Route::delete('/delete/{id}', [LandController::class,'destroy'])->name('land.delete');
    Route::get('/download/{id}', [LandController::class,'download'])->name('land.download');
});


Route::prefix('supplies')->group(function () {
    Route::get('/', [LandController::class,'index'])->name('supplies.index');
});


require __DIR__ . '/auth.php';
