<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SUController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard'); // Redirect to the dashboard
});

// Route for the main dashboard view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
Route::get('/dashboard', function () {
    return view('page.dashboard');
})->name('dashboard'); // Giving it a name for easier referencing

// Route for the attendance management view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
// Route::get('/attendance', function () {
//     return view('page.attendance');
// })->name('attendance');
Route::get('/report', function () {
    return view('page.report');
})->name('report');

// Route for the class management view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
// Route::get('/manage-class', function () {
//     return view('page.mangeClass'); // Corrected typo from 'mangeClass' to 'manageClass' in URL for better readability
// })->name('manage.class');

// Route for the student management view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
// Route::get('/manage-student', function () {
//     return view('page.mangeStudent'); // Corrected typo from 'mangeStudent' to 'manageStudent' in URL for better readability
// })->name('manage.student');

// Route for the QR code generation view.
// This route does NOT use student_dashboard.blade.php or student.blade.php directly.
Route::get('/qr-generate', function () {
    return view('page.qr_generate');
})->name('qr.generate');

Route::get('/student-list', [StudentController::class, 'student'])->name('studentlist');

Route::get('/attendance', [StudentController::class, 'attendance'])->name('attendance');

Route::get('/manage-class', [ClassController::class, 'SU'])->name('manage.class');

Route::get('/manage-student', [ClassController::class, 'SU1'])->name('manage.student');