<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CleanUpController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CleanUpController as AdminCleanUpController;
use App\Http\Controllers\User\CleanUpController as UserCleanUpController;


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
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::resource('/cleanups', UserCleanUpController::class)
        ->middleware(['auth', 'role:user,admin'])
        ->names('user.cleanups')
        ->only(['index', 'show']);
Route::resource('/admin/cleanups', AdminCleanUpController::class)->middleware(['auth', 'role:admin'])->names('admin.cleanups');


Route::resource('/user/cleanups', UserCleanUpController::class)->middleware(['auth', 'role:user'])->names('user.cleanups');


require __DIR__.'/auth.php';