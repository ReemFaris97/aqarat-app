<?php
namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

// Login
Route::get('login', [Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [Auth\LoginController::class,'login']);
Route::post('logout', [Auth\LoginController::class,'logout'])->name('logout');

// Dashboard
Route::group(['middleware'=>'admin'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('contacts', ContactController::class);
    Route::resource('admins',AdminsController::class);
    Route::resource('cities', CitiesController::class);
    Route::resource('neighborhoods', NeighborhoodsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('advertisings', AdvertisingsController::class);
    Route::resource('blogs', BlogsController::class);
    Route::resource('commonQuestions', CommonQuestionsController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('roles', RoleController::class);

    //change status
    Route::get('change-admins-status/{id}', [AdminsController::class,'changeStatus'])->name('admins.status');
    Route::get('change-users-status/{id}', [UsersController::class,'changeStatus'])->name('users.status');
    Route::get('change-cities-status/{id}', [CitiesController::class,'changeStatus'])->name('cities.status');    Route::get('change-neighborhoods-status/{id}', [NeighborhoodsController::class,'changeStatus'])->name('neighborhoods.status');
    Route::get('advertisings-cities-status/{id}', [AdvertisingsController::class,'changeStatus'])->name('advertisings.status');
    Route::get('change-blogs-status/{id}', [BlogsController::class,'changeStatus'])->name('blogs.status');
    Route::get('change-commonQuestions-status/{id}', [CommonQuestionsController::class,'changeStatus'])->name('commonQuestions.status');

});
