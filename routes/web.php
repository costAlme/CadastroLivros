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

/*Route::get('/', function () {
    return view('welcome');
});
*/

use App\Http\Controllers\BookController;


//Route::get('/books', 'App\Http\Controllers\BookController@index');
//Route::get('/books', 'App\Http\Controllers\BookController@show');
Route::get('/books', [BookController::class,'index']);

Route::get('/books/{id}', [BookController::class,'show']);

Route::get('/book/create', [BookController::class, 'create']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/books/{id}/edit',
[BookController::class, 'edit']);

Route::put('/books/{id}/update',
[BookController::class, 'update']);

Route::DELETE('/books/{id}', [BookController::class, 'destroy']);