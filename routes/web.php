<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BookAppController;
use App\Http\Controllers\SerialController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'web'])->group(function() {
    Route::prefix('tampilan/app')
        ->as('tampilan.apps.')
        ->controller(AppController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id}/edit', 'edit')->name('edit');
            
            Route::post('/', 'store')->name('store');

            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');
        });

    Route::prefix('tampilan/book')
        ->as('tampilan.books.')
        ->controller(BookController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            
            Route::post('/', 'store')->name('store');

            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');
        });

    Route::prefix('tampilan/book_app')
        ->as('tampilan.book_apps.')
        ->controller(BookAppController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id}/edit', 'edit')->name('edit');
            
            Route::post('/', 'store')->name('store');

            Route::put('/{id}', 'update')->name('update');

            Route::delete('/{id}', 'destroy')->name('destroy');
        });

    Route::prefix('tampilan/serial')
        ->as('tampilan.serials.')
        ->controller(SerialController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/laporan', 'laporan')->name('laporan');
            Route::get('/create', 'create')->name('create');
            Route::get('/{id_proses}', 'show')->name('show');
            // Route::get('/{id}/edit', 'edit')->name('edit');
            Route::get('/cetak_masal/{id_proses}', 'cetakMasal')->name('cetak_masal');
            Route::get('/cetak_satuan/{id}', 'cetakSatuan')->name('cetak_satuan');
            
            Route::post('/', 'store')->name('store');
            Route::post('/input-masal', 'processMassInput')->name('process-mass-input');

            // Route::put('/{id}', 'update')->name('update');

            // Route::delete('/{id}', 'destroy')->name('destroy');
        });
});