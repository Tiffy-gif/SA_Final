<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\SUController;
// use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard'); // Redirect to the dashboard
});

// Route for the main dashboard view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
Route::get('/dashboard', function () {
    return view('page.dashboard');
})->name('dashboard'); // Giving it a name for easier referencing


Route::get('/report', function () {
    return view('page.report');
})->name('report');


Route::get('/qr-generate', function () {
    return view('page.qr_generate');
})->name('qr.generate');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/student-list', [StudentController::class, 'student'])->name('studentlist');

Route::get('/attendance', [StudentController::class, 'attendance'])->name('attendance');

Route::get('/manage-class', [ClassController::class, 'SU'])->name('manage.class');

Route::get('/manage-student', [ClassController::class, 'SU1'])->name('manage.student');

Route::get('/student-dashboard', [ClassController::class, 'SU2'])->name('student_dashboard');


Route::resource('group', ClassController::class);
// Edit (GET form)
Route::get('/group/edit/{id}', [ClassController::class, 'edit'])->name('group.edit');

// Update (POST or PUT)
Route::post('/group/update/{id}', [ClassController::class, 'update'])->name('group.update');

// Delete
Route::delete('/group/delete/{id}', [ClassController::class, 'destroy'])->name('group.destroy');

Route::post('/mange-class/store', [ClassController::class, 'store'])->name('group.store');



