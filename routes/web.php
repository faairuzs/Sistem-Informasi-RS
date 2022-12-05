<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });
Route :: get("/",[LoginController::class,'showLoginForm'])->name('login');


Route::middleware(['auth'])->group(function(){

    Route::get('rekammedis', [PasienController::class, 'join'])->name('join');

    Route ::prefix("dokter")->group(function(){
        Route::get('/', [DokterController::class, 'index'])->name('dokter.index');
        Route::get('add', [DokterController::class, 'create'])->name('dokter.create');
        Route::post('store', [DokterController::class, 'store'])->name('dokter.store');
        Route::get('edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::post('update/{id}', [DokterController::class, 'update'])->name('dokter.update');
        Route::post('delete/{id}', [DokterController::class, 'delete'])->name('dokter.delete');
        });
    
    Route ::prefix("pasien")->group(function(){
        Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
        Route::get('add', [PasienController::class, 'create'])->name('pasien.create');
        Route::post('store', [PasienController::class, 'store'])->name('pasien.store');
        Route::get('edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::post('update/{id}', [PasienController::class, 'update'])->name('pasien.update');
        Route::post('delete/{id}', [PasienController::class, 'delete'])->name('pasien.delete');
        Route::post('recycle/{id}', [PasienController::class, 'recycle'])->name('pasien.recycle');
        Route::get('restore/{id}', [PasienController::class, 'restore'])->name('pasien.restore');
        });
    
    
        
    Route ::prefix("obat")->group(function(){
    Route::get('/', [ObatController::class, 'index'])->name('obat.index');
    Route::get('add', [ObatController::class, 'create'])->name('obat.create');
    Route::post('store', [ObatController::class, 'store'])->name('obat.store');
    Route::get('edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::post('update/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::post('delete/{id}', [ObatController::class, 'delete'])->name('obat.delete');
    });
    
    Route ::prefix("kamar")->group(function(){
    Route::get('/', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('add', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('store', [KamarController::class, 'store'])->name('kamar.store');
    Route::get('edit/{id}', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::post('update/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::post('delete/{id}', [KamarController::class, 'delete'])->name('kamar.delete');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
