<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ChadaController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// HomeController
Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/redirects', 'index')->name('redirects');
        Route::get('/bn_chada/search', 'search')->name('bn_chada.search');
    });
});


// SubscriberController
Route::middleware('auth')->group(function () {
    Route::controller(SubscriberController::class)->group(function(){
        Route::get('/bn_subscriber/index', 'index')->name('bn_subscriber.index');
        Route::get('/bn_subscriber/create', 'create')->name('bn_subscriber.create');
        Route::post('/bn_subscriber/store', 'store')->name('bn_subscriber.store');
        Route::get('/bn_subscriber/edit/{id}', 'edit')->name('bn_subscriber.edit');
        Route::post('/bn_subscriber/update', 'update')->name('bn_subscriber.update');
        Route::get('/bn_subscriber/delete/{id}', 'delete')->name('bn_subscriber.delete');

    });
});


// ChadaController
Route::middleware('auth')->group(function () {
    Route::controller(ChadaController::class)->group(function(){
        Route::get('/bn_chada/index', 'index')->name('bn_chada.index');
        Route::get('/bn_chada/create', 'create')->name('bn_chada.create');
        Route::post('/bn_chada/store', 'store')->name('bn_chada.store');
        Route::get('/bn_chada/edit/{id}', 'edit')->name('bn_chada.edit');
        //Route::get('/bn_chada/update', 'update')->name('bn_chada.update');
        Route::get('/bn_chada/delete/{id}', 'delete')->name('bn_chada.delete');

    });
});

// CashController
Route::middleware('auth')->group(function () {
    Route::controller(CashController::class)->group(function(){
        Route::get('/bn_cash/index', 'index')->name('bn_cash.index');
        Route::get('/bn_cash/create', 'create')->name('bn_cash.create');
        Route::post('/bn_cash/store', 'store')->name('bn_cash.store');
       // Route::get('/bn_cash/edit', 'edit')->name('bn_cash.edit');
        //Route::get('/bn_cash/update', 'update')->name('bn_cash.update');
        //Route::get('/bn_cash/delete', 'delete')->name('bn_cash.delete');
        Route::get('/bn_cash/view', 'view')->name('bn_cash.view');
        Route::get('/bn_cash/search', 'search')->name('bn_cash.search');

    });
});


require __DIR__.'/auth.php';


