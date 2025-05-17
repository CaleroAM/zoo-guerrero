<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CarefulController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmpshiftController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login', 301);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::resource('species', SpeciesController::class);
Route::resource('zones', ZoneController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('shifts', ShiftController::class); 
Route::resource('foods', FoodController::class);
Route::resource('lots', LotController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('dates', DateController::class);
Route::resource('empshifts', EmpshiftController::class);
Route::resource('animals', AnimalController::class);
Route::resource('carefuls', CarefulController::class);
});
Auth::routes();