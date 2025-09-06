<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthenticationController;

/*
 * Authentication routes
 */
Route::view('/', 'authentication.register')->name('registration');
Route::post('/register', [AuthenticationController::class,'registerUser'])->name('registerUser');
Route::view('/login', 'authentication.login')->name('login');
Route::post('/login', [AuthenticationController::class,'loginUser'])->name('loginUser');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[AuthenticationController::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[AuthenticationController::class,'logout'])->name('logout');
    Route::get('/addCompany',[CompanyController::class,'addCompanyForm'])->name('addCompanyForm');
    Route::post('/addCompany',[CompanyController::class,'addCompany'])->name('addCompany');
    Route::view('/inviteUsers/{id}','company.inviteusers', ['users' => User::all()->where('role','!=',1)])->name('inviteUsersForm');
});
