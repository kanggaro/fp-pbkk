<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ShelfController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// users api routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// book api routes
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/search', [BookController::class, 'search']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
Route::get('/books/category/{category}', [BookController::class, 'getByCategory']);
Route::get('/books/shelf/{shelf}', [BookController::class, 'getByShelf']);
Route::get('/books/author/{author}', [BookController::class, 'getByAuthor']);
Route::get('/books/publisher/{publisher}', [BookController::class, 'getByPublisher']);

// author api routes
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::put('/authors/{id}', [AuthorController::class, 'update']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

// category api routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// publisher api routes
Route::get('/publishers', [PublisherController::class, 'index']);
Route::get('/publishers/{id}', [PublisherController::class, 'show']);
Route::post('/publishers', [PublisherController::class, 'store']);
Route::put('/publishers/{id}', [PublisherController::class, 'update']);
Route::delete('/publishers/{id}', [PublisherController::class, 'destroy']);

// shelf api routes
Route::get('/shelves', [ShelfController::class, 'index']);
Route::get('/shelves/{id}', [ShelfController::class, 'show']);
Route::post('/shelves', [ShelfController::class, 'store']);
Route::put('/shelves/{id}', [ShelfController::class, 'update']);
Route::delete('/shelves/{id}', [ShelfController::class, 'destroy']);