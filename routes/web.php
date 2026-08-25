<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SsoAuthorizationController;
use App\Http\Controllers\SsoTokenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [
    DashboardController::class,
    'index',
])->middleware('auth')->name('dashboard');

Route::get('/sso/authorize', [
    SsoAuthorizationController::class,
    'authorize',
])->name('sso.authorize');

Route::post('/sso/token', [
    SsoTokenController::class,
    'token',
])->name('sso.token');
