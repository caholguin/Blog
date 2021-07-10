<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Homecontroller;
use App\Http\Controllers\Admin\CategoryController;


Route::get('', [Homecontroller::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->names('admin.categories');