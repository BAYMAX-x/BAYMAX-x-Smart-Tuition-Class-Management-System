<?php

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\StudentPageController;
use App\Http\Controllers\TeacherPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard');

    Route::get('/student/courses', [StudentPageController::class, 'courses'])
        ->name('student.courses');
    Route::get('/student/assignments', [StudentPageController::class, 'assignments'])
        ->name('student.assignments');
    Route::get('/student/exams', [StudentPageController::class, 'exams'])
        ->name('student.exams');
    Route::get('/student/calendar', [StudentPageController::class, 'calendar'])
        ->name('student.calendar');
    Route::get('/student/settings', [StudentPageController::class, 'settings'])
        ->name('student.settings');
    Route::get('/student/help', [StudentPageController::class, 'help'])
        ->name('student.help');
});

Route::middleware(['auth', 'teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function (): void {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])
            ->name('dashboard');
        Route::resource('students', StudentManagementController::class)
            ->except(['show']);
        Route::get('students/{student}/password', [StudentManagementController::class, 'editPassword'])
            ->name('students.password.edit');
        Route::put('students/{student}/password', [StudentManagementController::class, 'updatePassword'])
            ->name('students.password.update');

        Route::get('/courses', [TeacherPageController::class, 'courses'])
            ->name('courses');
        Route::get('/assignments', [TeacherPageController::class, 'assignments'])
            ->name('assignments');
        Route::get('/exams', [TeacherPageController::class, 'exams'])
            ->name('exams');
        Route::get('/calendar', [TeacherPageController::class, 'calendar'])
            ->name('calendar');
        Route::get('/settings', [TeacherPageController::class, 'settings'])
            ->name('settings');
        Route::get('/help', [TeacherPageController::class, 'help'])
            ->name('help');
    });

require __DIR__.'/auth.php';
