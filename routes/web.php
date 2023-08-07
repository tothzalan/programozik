<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PublicProfileController::class)->group(function () {
   Route::get('users/{name}', 'index');
});

Route::controller(ProjectController::class)->group(function () {
    Route::get('/projects', 'index')->name('projects.index');
    Route::get('/projects/create', 'create')->name('projects.create');
    Route::post('/projects/create', 'store');
    Route::get('/projects/edit/{project}', 'edit')->name('projects.edit');
    Route::get('/projects/{project}', 'show')->name('projects.show');
    Route::put('/projects/edit/{project}', 'update')->name('projects.update');
    Route::delete('/projects/delete/{project}', 'destroy')->name('projects.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
