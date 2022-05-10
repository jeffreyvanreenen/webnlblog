<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ContactController;

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

Route::get('index', [BlogsController::class, 'index']);
Route::get('fetchBlogPosts', [BlogsController::class, 'fetchBlogPosts']);
Route::get('fetchCategories', [BlogsController::class, 'fetchCategories']);
Route::get('fetchAuthors', [BlogsController::class, 'fetchAuthors']);
Route::get('show', [BlogsController::class, 'show']);
Route::post('contact', [ContactController::class, 'contact']);
