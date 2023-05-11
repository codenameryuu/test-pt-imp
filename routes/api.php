<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\User\UserController;

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

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'as' => 'api.auth.',
        'prefix' => 'auth',
    ],
    function () {
        Route::post('login', [AuthController::class, 'login'])
            ->name('login');

        Route::post('signup', [AuthController::class, 'signup'])
            ->name('signup');
    }
);

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'as' => 'api.user.',
        'middleware' => ['auth:api'],
        'prefix' => 'user',
    ],
    function () {
        Route::get('userlist', [UserController::class, 'index'])
            ->name('index');
    }
);
