<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::resource('authors.books', AuthorController::class);

//We could also define routes on this way:
Route::post('/authors/create', [AuthorController::class, 'store']);
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
Route::post('/authors/{author}/books/create', [BookController::class, 'store']);
Route::get('/authors/{author}/books', [BookController::class, 'index']);
Route::get('/authors/{author}/books/{book}', [BookController::class, 'show']);
Route::put('/authors/{author}/books/{book}', [BookController::class, 'update']);
Route::delete('/authors/{author}/books/{book}', [BookController::class, 'destroy']);
