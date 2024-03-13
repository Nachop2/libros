<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BooksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', [BooksController::class, 'index']);
Route::put('/book/add/{book}/{amount}', [BooksController::class, 'addStock']);
Route::put('/book/sell/{book}/{amount}', [BooksController::class, 'removeStock']);
Route::post('/book', [BooksController::class, 'store']);
Route::get('/book/{book}', [BooksController::class, 'show']);
Route::put('/book/{book}', [BooksController::class, 'update']);
Route::delete('/book/{book}', [BooksController::class, 'destroy']);