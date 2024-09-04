<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HoemController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.homepage.index');
//     // return view('welcome');
// });
Route::get('/', [HoemController::class, 'index'])->name('/');
Route::get('about', [HoemController::class, 'about'])->name('about');
Route::get('services', [HoemController::class, 'services'])->name('services');
Route::get('contact', [HoemController::class, 'contact'])->name('contact');
Route::get('case', [ProjectController::class, 'projects'])->name('case');
Route::get('/project/{slug}', [ProjectController::class, 'view'])->name('project.view');
Route::get('/project/all', [ProjectController::class, 'view'])->name('project.all');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


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

    // projects
    Route::get('/projects/list', [ProjectController::class, 'index'])->name('projects.list');
    Route::get('/projects/add', [ProjectController::class, 'add'])->name('projects.add');
    Route::get('projects/show/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('projects/{id}/activate', [ProjectController::class, 'activate'])->name('projects.activate');
    Route::post('projects/{id}/deactivate', [ProjectController::class, 'deactivate'])->name('projects.deactivate');


    Route::resource('projects', ProjectController::class);
});
