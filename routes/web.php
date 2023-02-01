<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/', '/en');

Route::prefix('/{language}')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::inertia('/about', 'About')->name('about');

    Route::get('/skills', SkillController::class)->name('skills');

    Route::prefix('/projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects');
        Route::get('/{project}-{slug}', [ProjectController::class, 'show'])->name('projects.show');
    });

    Route::post('/contact', ContactController::class)->name('contact');

});
