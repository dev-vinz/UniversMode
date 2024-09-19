<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\UserController;
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

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail']) //
    ->name('verification.verify')
    ->middleware(Auth::class);

/* * * * * * * * * * * * * * * *\
|*             POST            *|
\* * * * * * * * * * * * * * * */

Route::post('/verify-email', [AuthController::class, 'sendEmailVerificationLink']) //
    ->name('auth.send-email-verification-link')
    ->middleware(Auth::class);

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

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
|*                      NotFoundController                     *|
\* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/* * * * * * * * * * * * * * * *\
|*             GET             *|
\* * * * * * * * * * * * * * * */

Route::get('/profil', [UserController::class, 'profile']) //
    ->name('user.profile')
    ->middleware(Auth::class);

Route::get('/profil/adresses/', [UserController::class, 'addresses']) //
    ->name('user.addresses')
    ->middleware(Auth::class);

Route::get('/profil/adresses/create', [UserController::class, 'addressForm']) //
    ->name('user.create-address')
    ->middleware(Auth::class);

Route::get('/profil/adresses/{addressId}', [UserController::class, 'addressForm']) //
    ->name('user.edit-address')
    ->middleware(Auth::class);

Route::get('/profil/parametres', [UserController::class, 'settings']) //
    ->name('user.settings')
    ->middleware(Auth::class);

Route::get('/profil/parametres/informations', [UserController::class, 'informationsForm']) //
    ->name('user.informations-form')
    ->middleware(Auth::class);

Route::get('/profil/parametres/mot-de-passe', [UserController::class, 'passwordForm']) //
    ->name('user.password-form')
    ->middleware(Auth::class);

/* * * * * * * * * * * * * * * *\
|*             POST            *|
\* * * * * * * * * * * * * * * */

Route::post('/profil/adresses/create', [UserController::class, 'storeAddress']) //
    ->name('user.store-address')
    ->middleware(Auth::class);

/* * * * * * * * * * * * * * * *\
|*             PUT             *|
\* * * * * * * * * * * * * * * */

Route::put('/profil/adresses/{addressId}', [UserController::class, 'updateAddress']) //
    ->name('user.update-address')
    ->middleware(Auth::class);

Route::put('/profil/parametres/informations', [UserController::class, 'updateInformations']) //
    ->name('user.update-informations')
    ->middleware(Auth::class);

Route::put('/profil/parametres/mot-de-passe', [UserController::class, 'updatePassword']) //
    ->name('user.update-password')
    ->middleware(Auth::class);

/* * * * * * * * * * * * * * * *\
|*            DELETE           *|
\* * * * * * * * * * * * * * * */

Route::delete('/profil/adresses/{addressId}', [UserController::class, 'deleteAddress']) //
    ->name('user.delete-address')
    ->middleware(Auth::class);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
|*                      NotFoundController                     *|
\* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

Route::fallback(NotFoundController::class);
