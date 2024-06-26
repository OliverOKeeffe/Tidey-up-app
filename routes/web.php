<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CleanUpController as AdminCleanUpController;
use App\Http\Controllers\User\CleanUpController as UserCleanUpController;

use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use App\Http\Controllers\User\GroupController as UserGroupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Group of routes that require authentication
Route::middleware('auth')->group(function () {

    // Routes for profile actions (edit, update, delete)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for joining and leaving cleanups as an admin or user
    Route::post('/admin/cleanups/{cleanup}/join', [AdminCleanUpController::class, 'join'])->name('admin.cleanups.join');
    Route::post('/admin/cleanups/{cleanup}/leave', [AdminCleanUpController::class, 'leave'])->name('admin.cleanups.leave');
    Route::post('/user/cleanups/{cleanup}/join', [UserCleanUpController::class, 'join'])->name('user.cleanups.join');
    Route::post('/user/cleanups/{cleanup}/leave', [UserCleanUpController::class, 'leave'])->name('user.cleanups.leave');

    // Routes for joining and leaving groups as an admin or user
    Route::post('/admin/groups/{group}/join', [AdminGroupController::class, 'join'])->name('admin.groups.join');
    Route::post('/admin/groups/{group}/leave', [AdminGroupController::class, 'leave'])->name('admin.groups.leave');
    Route::post('/user/groups/{group}/join', [UserGroupController::class, 'join'])->name('user.groups.join');
    Route::post('/user/groups/{group}/leave', [UserGroupController::class, 'leave'])->name('user.groups.leave');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Resource routes for admin cleanups, requires authentication and admin role
Route::resource('/admin/cleanups', AdminCleanUpController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])
    ->names('admin.cleanups');

// Resource routes for user cleanups, requires authentication and user role
Route::resource('/user/cleanups', UserCleanUpController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])
    ->names('user.cleanups');

// Resource routes for admin groups, requires authentication and admin role
Route::resource('/admin/groups', AdminGroupController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])
    ->names('admin.groups');

// Resource routes for user groups, requires authentication and user role
Route::resource('/user/groups', UserGroupController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])
    ->names('user.groups');

// Include the routes from the auth.php file
require __DIR__ . '/auth.php';
