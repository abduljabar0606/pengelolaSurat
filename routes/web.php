<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\klasifikasiController;
use App\Http\Controllers\letterController;
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
Route::middleware('IsGuest')->group(function() {
    Route::get('/', function () {
        return view('login');
    })-> name('login');
    
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});
Route::middleware(['IsLogin'])->group(function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', function () {
        return view('home');
    })-> name('home.page');
});

Route::middleware(['IsLogin', 'IsStaff'])->group(function(){
    Route::prefix('/staff')->name('staff.')->group(function(){
        Route::get('/index', [userController::class, 'index'])->name('index');
        Route::get('/create', [userController::class, 'create'])->name('create');
        Route::post('/store', [userController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [userController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [userController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [userController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/guru')->name('guru.')->group(function(){
        Route::get('/index', [userController::class, 'indexGuru'])->name('index');
        Route::get('/create', [userController::class, 'createGuru'])->name('create');
        Route::post('/store', [userController::class, 'storeGuru'])->name('store');
        Route::get('/edit/{id}', [userController::class, 'editGuru'])->name('edit');
        Route::patch('/update/{id}', [userController::class, 'updateGuru'])->name('update');
        Route::delete('/delete/{id}', [userController::class, 'destroyGuru'])->name('delete');
    });

    Route::prefix('/data')->name('data.')->group(function(){
        Route::get('/index', [klasifikasiController::class, 'index'])->name('index');
        Route::get('/create', [klasifikasiController::class, 'create'])->name('create');
        Route::post('/store', [klasifikasiController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [klasifikasiController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [klasifikasiController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [klasifikasiController::class, 'destroy'])->name('delete');
        Route::get('/export/exel', [klasifikasiController::class, 'exportExcel'])->name('export');
        Route::get('/detail/{id}', [klasifikasiController::class, 'detail'])->name('detail');
    });

    Route::prefix('/surat')->name('surat.')->group(function(){
        Route::get('/', [letterController::class, 'index'])->name('index');
        Route::get('/create', [letterController::class, 'create'])->name('create');
        Route::post('/store', [letterController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [letterController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [letterController::class, 'destroy'])->name('delete');
        Route::get('/print/{id}', [letterController::class, 'show'])->name('print');
    });
});

Route::middleware(['IsLogin', 'IsGuru'])->group(function(){
    Route::prefix('/guru')->name('guru.')->group(function() {
        Route::prefix('/surat')->name('surat.')->group(function() {
            Route::get('/', [letterController::class, 'index'])->name('index');
        });
    });
});

