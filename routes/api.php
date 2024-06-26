<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BooksController;
use App\Http\Controllers\InvoiceController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

    
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/books', [BooksController::class, 'index']);
    Route::put('/book/add/{book}/{amount}', [BooksController::class, 'addStock']);
    Route::put('/book/sell/{book}/{amount}', [BooksController::class, 'removeStock']);
    Route::post('/book', [BooksController::class, 'store']);
    Route::get('/book/{book}', [BooksController::class, 'show']);
    Route::put('/book/{book}', [BooksController::class, 'update']);
    Route::delete('/book/{book}', [BooksController::class, 'destroy']);
    Route::get('/books/search', [BooksController::class, 'search']);
    Route::post('/invoice', [InvoiceController::class, 'store']);
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoice/{invoice}', [InvoiceController::class, 'show']);
});


Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::post('/admin/users', [App\Http\Controllers\AdminUserController::class, 'store']);
    Route::put('/admin/users/{id}/reset-password', [App\Http\Controllers\AdminUserController::class, 'resetPassword']);
    Route::delete('/admin/users/{id}', [App\Http\Controllers\AdminUserController::class, 'destroy']);
    Route::get('/admin/users', [App\Http\Controllers\AdminUserController::class, 'index']);
});
