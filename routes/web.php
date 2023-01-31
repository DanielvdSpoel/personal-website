<?php

use App\Http\Controllers\ContactController;
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
Route::prefix('/{language}')->group(function () {
    Route::inertia('/', 'Home')->name('home');
    Route::inertia('/about', 'About')->name('about');
    Route::inertia('/projects', 'Projects')->name('projects');
    Route::inertia('/uses', 'Uses')->name('uses');
    Route::post('/contact', ContactController::class)->name('contact');

});


