<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
    ]);


Route::get('service/{type}/{number}', [App\Http\Controllers\Api\ServiceController::class, 'service']);

Route::middleware(['auth', 'verified'])->group(function() {
    //Home
    Route::prefix('home')->group(function() {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        // Route::get('/records', [App\Http\Controllers\HomeController::class, 'binnacle']);
        // Route::get('binnacle/records', 'DashboardController@binnacle');
    });

// Parte Diario
//     Route::prefix('binnacles')->group(function() {
//     Route::get('/', [App\Http\Controllers\Binnacle\BinnacleController::class, 'index'])->name('binnacles.index');
//     Route::post('/', [App\Http\Controllers\Binnacle\BinnacleController::class, 'store'])->name('binnacles.store');
//     Route::patch('/edit/{id}', [App\Http\Controllers\Binnacle\BinnacleController::class, 'update'])->name('binnacles.update');
//     Route::delete('/{id}', [App\Http\Controllers\Binnacle\BinnacleController::class, 'destroy'])->name('binnacles.delete');
//     Route::get('/tables', [App\Http\Controllers\Binnacle\BinnacleController::class, 'tables']);
//     Route::get('/records', [App\Http\Controllers\Binnacle\BinnacleController::class, 'records']);
//     Route::get('/record/{id}', [App\Http\Controllers\Binnacle\BinnacleController::class, 'record']);
//     Route::get('/data_table', [App\Http\Controllers\Binnacle\BinnacleController::class, 'data_table']);
//     Route::post('/import', [App\Http\Controllers\Binnacle\BinnacleController::class, 'import']);
// });

// Usuarios
    Route::prefix('users')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
        // Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'store']);
        // Route::patch('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
        // Route::delete('/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
        // Route::get('/records', [App\Http\Controllers\Admin\UserController::class, 'records']);
        // Route::get('/record/{id}', [App\Http\Controllers\Admin\UserController::class, 'record']);
        // Route::get('/tables', [App\Http\Controllers\Admin\UserController::class, 'tables']);
    });

// Clientes
    // Route::prefix('persons')->group(function() {
    //     Route::get('/', [App\Http\Controllers\Admin\PersonController::class, 'index'])->name('App\Http\Controllers\Admin\persons.index');
    //     Route::post('/', [App\Http\Controllers\Admin\PersonController::class, 'store']);
    //     Route::patch('/edit/{id}', [App\Http\Controllers\Admin\PersonController::class, 'update']);
    //     Route::delete('/{id}', [App\Http\Controllers\Admin\PersonController::class, 'destroy']);
    //     Route::get('/records', [App\Http\Controllers\Admin\PersonController::class, 'records']);
    //     Route::get('/record/{id}', [App\Http\Controllers\Admin\PersonController::class, 'record']);
    //     Route::get('/tables', [App\Http\Controllers\Admin\PersonController::class, 'tables']);
    //     Route::get('/columns', [App\Http\Controllers\Admin\PersonController::class, 'columns']);
    //     Route::get('/enabled/{type}/{id}', [App\Http\Controllers\Admin\PersonController::class, 'enabled']);
    // });

// Mail-Solicitud-docuemntos
    // Route::prefix('mail-documents')->group(function() {
    //     Route::get('/', [App\Http\Controllers\Mail\SolicitudDocumentosController::class, 'index'])->name('mail-documents.index');
    //     Route::post('/', [App\Http\Controllers\Mail\SolicitudDocumentosController::class, 'store'])->name('mail-documents.store');
    //     Route::get('/tables', [App\Http\Controllers\Mail\SolicitudDocumentosController::class, 'tables']);
    //     Route::get('/records', [App\Http\Controllers\Mail\SolicitudDocumentosController::class, 'records']);
    //     Route::get('/columns', [App\Http\Controllers\Mail\SolicitudDocumentosController::class, 'columns']);
    // });
});