<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
    ]);


Route::get('service/{type}/{number}', [ServiceController::class, 'service']);

Route::middleware(['auth', 'verified'])->group(function() {
    //Home
    Route::prefix('home')->group(function() {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/records', [App\Http\Controllers\HomeController::class, 'binnacle']);
        // Route::get('binnacle/records', 'DashboardController@binnacle');
    });

// Parte Diario
    Route::prefix('binnacles')->group(function() {
    Route::get('/', [BinnacleController::class, 'index'])->name('binnacles.index');
    Route::post('/', [BinnacleController::class, 'store'])->name('binnacles.store');
    Route::patch('/edit/{id}', [BinnacleController::class, 'update'])->name('binnacles.update');
    Route::delete('/{id}', [BinnacleController::class, 'destroy'])->name('binnacles.delete');
    Route::get('/tables', [BinnacleController::class, 'tables']);
    Route::get('/records', [BinnacleController::class, 'records']);
    Route::get('/record/{id}', [BinnacleController::class, 'record']);
    Route::get('/data_table', [BinnacleController::class, 'data_table']);
    Route::post('/import', [BinnacleController::class, 'import']);
});

// Usuarios
    Route::prefix('admin/users')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::patch('/edit/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::get('/records', [UserController::class, 'records']);
        Route::get('/record/{id}', [UserController::class, 'record']);
        Route::get('/tables', [UserController::class, 'tables']);
    });

// Clientes
    Route::prefix('persons')->group(function() {
        Route::get('/', [PersonController::class, 'index'])->name('persons.index');
        Route::post('/', [PersonController::class, 'store']);
        Route::patch('/edit/{id}', [PersonController::class, 'update']);
        Route::delete('/{id}', [PersonController::class, 'destroy']);
        Route::get('/records', [PersonController::class, 'records']);
        Route::get('/record/{id}', [PersonController::class, 'record']);
        Route::get('/tables', [PersonController::class, 'tables']);
        Route::get('/columns', [PersonController::class, 'columns']);
        Route::get('/enabled/{type}/{id}', [PersonController::class, 'enabled']);
    });

// Mail-Solicitud-docuemntos
    Route::prefix('mail-documents')->group(function() {
        Route::get('/', [SolicitudDocumentosController::class, 'index'])->name('mail-documents.index');
        Route::post('/', [SolicitudDocumentosController::class, 'store'])->name('mail-documents.store');
        Route::get('/tables', [SolicitudDocumentosController::class, 'tables']);
        Route::get('/records', [SolicitudDocumentosController::class, 'records']);
        Route::get('/columns', [SolicitudDocumentosController::class, 'columns']);
    });
});