<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.homepage.index');
    // return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', function () {
            return view('backend.dashboard.index');
        })->name('dashboard');
});
