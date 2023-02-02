<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'Backend','prefix'=>'company-admin'],function(){
    Route::get('/',[BackendController::class,'index'])->name('dashboard');
});