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
    Route::resource('admins',AdminsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('cities', CitiesController::class);
    Route::resource('neighborhoods', NeighborhoodsController::class);
    Route::resource('blogs', BlogsController::class);
    Route::resource('comments', CommentsController::class);
    Route::resource('commonQuestions', CommonQuestionsController::class);
    Route::resource('settings', SettingController::class);

});
