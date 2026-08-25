<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SsoAuthorizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/sso/authorize', [
    SsoAuthorizationController::class,
    'authorize',
])->name('sso.authorize');
