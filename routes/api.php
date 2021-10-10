<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Book routes
Route::get('/books', [BookController::class, 'showAllBooks']);
Route::get('/books/{id}', [BookController::class, 'showOneBook']);

// Author routes
Route::get('/authors', [AuthorController::class, 'showAllAuthors']);
Route::get('/authors/{id}', [AuthorController::class, 'showOneAuthor']);

// Genre routes
Route::get('/genres', [GenreController::class, 'showAllGenres']);
Route::get('/genres/{id}', [GenreController::class, 'showOneGenre']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
