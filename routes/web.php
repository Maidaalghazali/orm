<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('skills', SkillController::class);
