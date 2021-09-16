<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\AdvertisementTypeController;
use App\Http\Controllers\Api\Auth\AdvertisementsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\FavouriteController;
use App\Http\Controllers\Api\Auth\NotificationController;
use App\Http\Controllers\Api\Auth\OrderController;
use App\Http\Controllers\Api\Auth\Requests\OrderController as requestOrderController;
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

Route::group(['middleware' => 'localization'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('forget-password', [AuthController::class, 'forgetPassword']);
        Route::post('forget-password/check', [AuthController::class, 'checkCode']);
        Route::post('forget-password/reset', [AuthController::class, 'resetPassword']);
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('chat/model',[ChatController::class,'getMessagesByModel']);
            Route::post('logout',[AuthController::class,'logout']);
            Route::get('profile', [AuthController::class, 'profile']);
            Route::put('profile', [AuthController::class, 'update']);
            Route::apiResources([
                'advertisements' => AdvertisementsController::class,
                'favourites' => FavouriteController::class,
                'medias' => MediaController::class,
                'orders' => OrderController::class,
                'notifications' => NotificationController::class,
                'chats'=>ChatController::class
            ]);
            Route::put('request/orders/{order}', requestOrderController::class);
            Route::get('advertisement-favourites', [FavouriteController::class, 'advertisements']);
            Route::get('order-favourites', [FavouriteController::class, 'orders']);
            Route::put('blogs/{blog}', [BlogController::class, 'update']);
        });
    });

    Route::group(['middleware' => 'jwt.check'], function () {

        Route::get('blogs/{blog}', \App\Http\Controllers\BlogController::class)->name('web.blog');
        Route::get('advertisement-types',AdvertisementTypeController::class);
        Route::get('cities', CityController::class);
        Route::get('settings', SettingController::class);
        Route::get('categories', CategoryController::class);
        Route::get('utilities', UtilityController::class);
        Route::get('blogs', [BlogController::class, 'index']);
        Route::put('blogs/{blog}', [BlogController::class, 'update']);
        Route::resources([
//        'blogs' => BlogController::class,
            'questions' => QuestionController::class,
            'contacts' => ContactController::class,
            'advertisements' => \App\Http\Controllers\Api\AdvertisementsController::class,
            'orders' => \App\Http\Controllers\Api\OrderController::class,
            'comments' => \App\Http\Controllers\Api\CommentController::class
        ]);

        Route::post('view', ViewController::class);
    });
});

/////////////////////////////////////////////

/////////////////////////////////////////////
