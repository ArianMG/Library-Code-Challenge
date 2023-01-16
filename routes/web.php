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

Route::get('/', function () {
    return view('welcome');
});

// ADMIN ROUTES
Route::group(['prefix' => 'admin'], function () {

    // ADMIN - BOOKS ROUTES
    Route::group(['prefix' => 'books', 'as' => 'book.'], function () {
        Route::get('/', [App\Http\Controllers\BookController::class, 'index'])
            ->name('index');

        Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])
            ->name('create');

        Route::get('/{book}', [App\Http\Controllers\BookController::class, 'show'])
            ->name('show');

        Route::get('/edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])
            ->name('edit');

        Route::post('/', [App\Http\Controllers\BookController::class, 'store'])
            ->name('store');

        Route::put('/{book}', [App\Http\Controllers\BookController::class, 'update'])
            ->name('update');

        Route::get('/{book}', [App\Http\Controllers\BookController::class, 'destroy'])
            ->name('destroy');
    });

    // ADMIN - USERS ROUTES
    Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])
            ->name('index');

        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])
            ->name('create');

        Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])
            ->name('show');

        Route::get('/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])
            ->name('edit');

        Route::post('/', [App\Http\Controllers\UserController::class, 'store'])
            ->name('store');

        Route::put('/{user}', [App\Http\Controllers\UserController::class, 'update'])
            ->name('update');

        Route::put('/pwd/{user}', [App\Http\Controllers\UserController::class, 'updatePwd'])
            ->name('update.pwd');

        Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])
            ->name('destroy');
    });

    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])
            ->name('index');

        Route::get('/create', [App\Http\Controllers\CategoryController::class, 'create'])
            ->name('create');

        Route::get('/{category}', [App\Http\Controllers\CategoryController::class, 'show'])
            ->name('show');

        Route::get('/edit/{category}', [App\Http\Controllers\CategoryController::class, 'edit'])
            ->name('edit');

        Route::post('/', [App\Http\Controllers\CategoryController::class, 'store'])
            ->name('store');

        Route::put('/{category}', [App\Http\Controllers\CategoryController::class, 'update'])
            ->name('update');

        Route::get('/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])
            ->name('destroy');
    });
});
