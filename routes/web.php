<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ProjectController::class, 'home'])->name('welcome');


Route::get('/artist', [UserController::class, 'artist_index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('projectUsers', ProjectUserController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('artists', UserController::class);
    Route::resource('admin', AdminController::class);
    Route::put('/admin/users/{id}/updateStatus', [AdminController::class, 'updateStatus'])->name('admin.users.updateStatus');

});

require __DIR__ . '/auth.php';
