<?php

use App\Http\Controllers\Backend\Auth\AdminloginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Auth\loginController;
use App\Http\Controllers\Frontend\index\IndexController;
use App\Http\Controllers\Backend\admin\AdminController;

Route::get('/', function () {
    return view('frontend.pages.homePage.index');
});
Route::get('/contact', function () {
    return view('frontend.pages.contact.contact');
});
Route::get('/news', function () {
    return view('frontend.pages.news.news');
});
Route::get('/categories', function () {
    return view('frontend.pages.categories.categories');
});

Route::get('login', function (){
    return "test";
})->name('login');

Route::get('logout', function (){
    return view('Normal logout')->name('logout');
});

Route::group(['namespace'=>'Backend'],function(){
    Route::get('/admin-login',[AdminloginController::class,'index'])->name('admin-login');
    Route::resource('/admin','\App\Http\Controllers\Backend\admin\AdminController');
    Route::post('/admin-login',[AdminloginController::class,'login']);
});

Route::group(['namespace'=>'Backend','prefix'=>'company-admin','middleware'=>'auth:admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::any('/admin-logout',[AdminloginController::class,'logout'])->name('admin-logout');
});