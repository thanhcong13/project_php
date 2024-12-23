<?php

use App\Http\Controllers\CommentController;

use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login-api', [LoginController::class, 'loginApi']);
});

Route::group(['prefix' => 'comment'], function () {
    Route::post('/create-api', [CommentController::class, 'storeApi']);
    Route::post('/create-comment', [CommentController::class, 'createCommentRealTime'])->name('comment.create-comment');
});
