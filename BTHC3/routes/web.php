<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\EmployeeController;
Route::resource('employees', EmployeeController::class);
Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
