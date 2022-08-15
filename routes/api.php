<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ToDoListController;
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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::get('/products/{id}', [ProductController::class, 'show']);
// Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/todolist', [ToDoListController::class, 'index']);
    Route::post('/todolist/store', [ToDoListController::class, 'store']);
    Route::put('/todolist/update/{id}', [ToDoListController::class, 'update']);
    Route::get('/todolist/search/{name}', [ToDoListController::class, 'search']);
    Route::get('/todolist/search/{name}', [ToDoListController::class, 'search']);
    Route::delete('/todolist/destroy/{id}', [ToDoListController::class, 'destroy']);
    Route::get('/todolist/sortByName', [ToDoListController::class, 'sort']);




    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{id}', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
