<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\SchoolController;

Route::get('students',[SchoolController::class,'students'])->name('students.index');
Route::get('students/create',[SchoolController::class,'createStudent'])->name('students.create');
Route::post('students',[SchoolController::class,'storeStudent'])->name('students.store');

Route::get('courses',[SchoolController::class,'courses'])->name('courses.index');
Route::get('courses/create',[SchoolController::class,'createCourse'])->name('courses.create');
Route::post('courses',[SchoolController::class,'storeCourse'])->name('courses.store');

Route::get('enrollments',[SchoolController::class,'enrollments'])->name('enrollments.index');
Route::get('enrollments/create',[SchoolController::class,'createEnrollment'])->name('enrollments.create');
Route::post('enrollments',[SchoolController::class,'storeEnrollment'])->name('enrollments.store');