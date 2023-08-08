<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
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

Route::prefix('websites')->group(function () {
    Route::get('/', [WebsiteController::class, 'index']);
    Route::post('/', [WebsiteController::class, 'store']);
});
Route::prefix('websites/{website}')->group(function () {
    Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
    
    Route::post('/posts', [PostController::class, 'store']);
});


