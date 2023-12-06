<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RecepieController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('clients', ClientController::class);
        Route::resource('users', UserController::class);
        Route::get('recepie', [RecepieController::class, 'index'])->name('recepies.index');
        Route::get('recepie/{recepie}', [RecepieController::class, 'show'])->name('recepies.show');
        Route::get('recepie/{recepie}/edit', [RecepieController::class, 'edit'])->name('recepies.edit');
        Route::put('recepie/{recepie}', [RecepieController::class, 'update'])->name('recepies.update');
        Route::delete('recepie/{recepie}', [RecepieController::class, 'destroy'])->name('recepies.destroy');
        route::get('recepie/create', [RecepieController::class, 'create'])->name('recepies.create');
        route::post('recepie', [RecepieController::class, 'store'])->name('recepies.store');

        
    });
