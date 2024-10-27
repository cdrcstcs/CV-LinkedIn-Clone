<?php

use App\Http\Controllers\{
    ProfileController,
    PostController,
    ConnectionController,
    JobController,
    NotificationController,
    EventController,
    GroupController,
    EducationController,
    CompanyController,
    ApplicationController,
    MessageController,
    CommentController,
    SkillController,
    EndorsementController,
    UserController,
};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|-----------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Management Routes
    Route::resource('users', UserController::class)->except(['create', 'edit']);

    // Post Routes
    Route::resource('posts', PostController::class);

    // Comment Routes
    Route::resource('comments', CommentController::class)->except(['create', 'show']);

    // Connection Routes
    Route::get('/connections', [ConnectionController::class, 'index'])->name('connections.index');
    Route::post('/connections', [ConnectionController::class, 'store'])->name('connections.store');
    Route::patch('/connections/{id}', [ConnectionController::class, 'update'])->name('connections.update');
    Route::delete('/connections/{id}', [ConnectionController::class, 'destroy'])->name('connections.destroy');

    // Job Routes
    Route::resource('jobs', JobController::class);

    // Company Routes
    Route::resource('companies', CompanyController::class);

    // Application Routes
    Route::resource('applications', ApplicationController::class)->only(['index', 'store', 'update', 'destroy']);

    // Message Routes
    Route::resource('messages', MessageController::class)->only(['index', 'store', 'update', 'destroy']);

    // Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    // Skill Routes
    Route::resource('skills', SkillController::class)->except(['create', 'show']);

    // Endorsement Routes
    Route::resource('endorsements', EndorsementController::class)->except(['create', 'show']);

    // Event Routes
    Route::resource('events', EventController::class);

    // Group Routes
    Route::resource('groups', GroupController::class);

    // Education Routes
    Route::resource('educations', EducationController::class);
});

// Authentication routes
require __DIR__.'/auth.php';
