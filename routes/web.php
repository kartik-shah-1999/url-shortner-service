<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'authentication.register')->name('registration');
Route::post('/register', [AuthenticationController::class,'registerUser'])->name('registerUser');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthenticationController::class,'loginUser'])->name('loginUser');
Route::get('/dashboard',[AuthenticationController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout',[AuthenticationController::class,'logout'])->middleware('auth')->name('logout');