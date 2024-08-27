<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
|*                        AuthController                       *|
\* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*             GET             *|
\* * * * * * * * * * * * * * * */

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']) //
    ->name('auth.forgot-password')
    ->middleware(Guest::class);

Route::get('/login', [AuthController::class, 'login']) //
    ->name('auth.login')
    ->middleware(Guest::class);

Route::get('/logout', [AuthController::class, 'logout']) //
    ->name('auth.logout')
    ->middleware(Auth::class);

Route::get('/register', [AuthController::class, 'register']) //
    ->name('auth.register')
    ->middleware(Guest::class);

Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword']) //
    ->name('password.reset')
    ->middleware(Guest::class);

/* * * * * * * * * * * * * * * *\
|*             POST            *|
\* * * * * * * * * * * * * * * */

Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink']) //
    ->name('auth.send-password-reset-link')
    ->middleware(Guest::class);

Route::post('/login', [AuthController::class, 'authenticate']) //
    ->name('auth.authenticate')
    ->middleware(Guest::class);

Route::post('/register', [AuthController::class, 'store']) //
    ->name('auth.store')
    ->middleware(Guest::class);

Route::post('/reset-password', [AuthController::class, 'passwordReset']) //
    ->name('auth.reset-password')
    ->middleware(Guest::class);

/* * * * * * * * * * * * * * * *\
|*             PUT             *|
\* * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*            DELETE           *|
\* * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
|*                       IndexController                       *|
\* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*             GET             *|
\* * * * * * * * * * * * * * * */

Route::get('/', [IndexController::class, 'index']) //
    ->name('index');

/* * * * * * * * * * * * * * * *\
|*             POST            *|
\* * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*             PUT             *|
\* * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*            DELETE           *|
\* * * * * * * * * * * * * * * */
