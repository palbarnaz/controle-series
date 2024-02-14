<?php
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
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
    return redirect('/series');
})->middleware(Autenticador::class);


Route::resource('/series', SeriesController::class)
    ->except(['show']);



Route::get('/series/{serie}/temporadas',
[TemporadasController::class, 'index'])->name('temporadas.index');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signIn');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');
Route::delete('/register', [UsersController::class, 'store'])->name('users.store');


