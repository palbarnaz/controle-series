<?php
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
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
});


// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/criar', [SeriesController::class, 'create']);
// Route::post('/series/salvar', [SeriesController::class, 'store']);

Route::controller(SeriesController::class)->group(function(){
    Route::get('/series',  'index');
   Route::get('/series/criar', 'create');
  Route::post('/series/salvar', 'store');
  Route::delete('/series/destruir/{serie}', 'destroy');
  Route::put('/series/editar/{serie}', 'edit');
  Route::put('/series/salvarEdicao/{id}', 'update');

});
