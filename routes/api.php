<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Auth\AdvertisementsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\FavouriteController;
use App\Http\Controllers\Api\Auth\OrderController;
use App\Models\Order;
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

Route::group([], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('forget-password', [AuthController::class, 'forgetPassword']);
        Route::post('forget-password/check', [AuthController::class, 'checkCode']);
        Route::post('forget-password/reset', [AuthController::class, 'resetPassword']);
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('profile', [AuthController::class, 'profile']);
            Route::put('profile', [AuthController::class, 'update']);
            Route::apiResources([
                'advertisements' => AdvertisementsController::class,
                'favourites' => FavouriteController::class,
                'medias' => MediaController::class,
                'orders'=>OrderController::class

            ]);
        });
    });

    Route::get('cities', CityController::class);
    Route::get('settings', SettingController::class);
    Route::get('categories', CategoryController::class);
    Route::resources([
        'blogs' => BlogController::class,
        'questions' => QuestionController::class,
        'contacts' => ContactController::class,
    ]);
});

/////////////////////////////////////////////

/////////////////////////////////////////////
