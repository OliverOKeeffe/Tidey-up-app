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

Route::middleware('auth')->group(function () {
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/admin/cleanups/{cleanup}/join', [AdminCleanUpController::class, 'join'])->name('admin.cleanups.join');
    Route::post('/admin/cleanups/{cleanup}/leave', [AdminCleanUpController::class, 'leave'])->name('admin.cleanups.leave');
    Route::post('/user/cleanups/{cleanup}/join', [UserCleanUpController::class, 'join'])->name('user.cleanups.join');
    Route::post('/user/cleanups/{cleanup}/leave', [UserCleanUpController::class, 'leave'])->name('user.cleanups.leave');

    
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Route::resource('/cleanups', UserCleanUpController::class)
//         ->middleware(['auth', 'role:user,admin'])
//         ->names('user.cleanups')
//         ->only(['index', 'show']);

Route::resource('/admin/cleanups', AdminCleanUpController::class)
        ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])
        ->names('admin.cleanups');
    
Route::resource('/user/cleanups', UserCleanUpController::class)
        ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])
        ->names('user.cleanups');


// Route::resource('/user/cleanups', UserCleanUpController::class)->middleware(['auth', 'role:user'])->names('user.cleanups');

Route::resource('/admin/groups', AdminGroupController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':admin'])
    ->names('admin.groups');

Route::resource('/user/groups', UserGroupController::class)
    ->middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':user'])
    ->names('user.groups');


require __DIR__.'/auth.php';