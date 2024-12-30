<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Like;

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

Route::get('/ideas/{id}', [IdeaController::class, 'index'])->name('ideas.index');
Route::post('/ideas/create', [IdeaController::class, 'store'])->name('ideas.store');
Route::delete('/ideas/delete/{id}',[IdeaController::class, 'delete'])->name('ideas.delete');
Route::put('/ideas/update/{id}',[IdeaController::class, 'update'])->name('ideas.update');

Route::post('/ideas/{idea}/comments',[CommentController::class, 'store'])->name('ideas.comments.store');

Route::post('/ideas/{idea}/like',[LikeController::class, 'like'])->name('ideas.idea.like');
Route::post('/ideas/{idea}/unlike',[LikeController::class, 'unLike'])->name('ideas.idea.unlike');


Route::get('/profile',[ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::get('/logout',[LoginController::class, 'signOut'])->name('logout');
Route::post('/login-user',[LoginController::class, 'store'])->name('login.user');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register-user',[RegisterController::class, 'register'])->name('register.user');
Route::post('/verify/email',[RegisterController::class, 'sendOtp'])->name('verify.otp');
Route::get('/verify/email/{user}',[RegisterController::class, 'verifyFrom'])->name('verify.form');


Route::get('/layout', function(){
    return view('layout.layout');
});