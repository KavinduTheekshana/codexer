<?php

use App\Http\Controllers\HoemController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.homepage.index');
//     // return view('welcome');
// });
Route::get('/', [HoemController::class, 'index'])->name('/');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

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

    // Testimonial
    Route::get('/testimonials/list', [TestimonialController::class, 'index'])->name('testimonials.list');
    Route::get('/testimonials/add', [TestimonialController::class, 'add'])->name('testimonials.add');
    Route::resource('testimonials', TestimonialController::class);

    // Subscribers
    Route::get('/subscriptions/list', [SubscriptionController::class, 'index'])->name('subscriptions.list');
    Route::delete('/subscriptions/{id}', [SubscriptionController::class, 'destroy'])->name('subscriptions.delete');
});
