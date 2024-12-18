<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('feed',[FeedController::class, 'index'])->name('feed')->middleware('auth');

Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');

Route::delete('/idea/{id}',[IdeaController::class, 'delete'])->name('idea.delete');

Route::get('/profile',[ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::get('/logout',[LoginController::class, 'signOut'])->name('logout');
Route::post('/login-user',[LoginController::class, 'store'])->name('login.user');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register-user',[RegisterController::class, 'register'])->name('register.user');


Route::get('/layout', function(){
    return view('layout.layout');
});