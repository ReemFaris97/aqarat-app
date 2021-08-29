<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

// Login
Route::get('login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [Auth\LoginController::class, 'login']);
Route::post('logout', [Auth\LoginController::class, 'logout'])->name('logout');
// Dashboard


Route::group(['middleware' => ['admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'contacts' => ContactController::class,
        'admins' => AdminsController::class,
        'cities' => CitiesController::class,
        'neighborhoods' => NeighborhoodsController::class,
        'users' => UsersController::class,
        'offers' => OffersController::class,
        'requests' => RequestsController::class,
        'advertising' => AdvertisingsController::class,
        'notifications'=>NotificationController::class,
        'blogs' => BlogsController::class,
        'comments' => CommentController::class,
        'commonQuestions' => CommonQuestionsController::class,
        'settings' => SettingController::class,
        'roles' => RoleController::class,
        'attributes' => AttributesController::class,
        'utilities' => UtilityController::class,
        'categories' => CategoriesController::class,
        'orders' => OrderController::class,

        'users-advertisers' => UserAdvertisersController::class,
        'users-orders' => UserOrderController::class,
        'orders-requests' => OrderRequestController::class,
    ]);

    //change status
    Route::get('change-admins-status/{id}', [AdminsController::class, 'changeStatus'])->name('admins.status');
    Route::get('change-users-status/{id}', [UsersController::class, 'changeStatus'])->name('users.status');
    Route::get('change-cities-status/{id}', [CitiesController::class, 'changeStatus'])->name('cities.status');
    Route::get('change-neighborhoods-status/{id}', [NeighborhoodsController::class, 'changeStatus'])->name('neighborhoods.status');
    Route::get('advertisers-cities-status/{id}', [AdvertisingsController::class, 'changeStatus'])->name('advertisers.status');
    Route::get('advertisers-approved/{id}', [UserAdvertisersController::class, 'approved'])->name('advertisers.approved');
    Route::get('orders-approved/{id}', [UserOrderController::class, 'approved'])->name('orders.approved');
    Route::get('change-blogs-status/{id}', [BlogsController::class, 'changeStatus'])->name('blogs.status');
    Route::get('change-comment-status/{id}', [CommentController::class, 'changeVisiblity'])->name('comments.status');
    Route::get('change-commonQuestions-status/{id}', [CommonQuestionsController::class, 'changeStatus'])->name('commonQuestions.status');
    Route::post('upload', [BlogsController::class, 'ckeditor']);
    Route::delete('delete/photo/{id}', [UserAdvertisersController::class, 'deletePhoto'])->name('deletePhoto');

});
