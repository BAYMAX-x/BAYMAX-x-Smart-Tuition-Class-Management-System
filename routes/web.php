<?php

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
use App\Http\Controllers\Teacher\AssignmentController as TeacherAssignmentController;
use App\Http\Controllers\Teacher\ExamController as TeacherExamController;
use App\Http\Controllers\Teacher\ZoomLinkController as TeacherZoomLinkController;
use App\Http\Controllers\Teacher\SettingsController as TeacherSettingsController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\StudentPageController;
use App\Http\Controllers\TeacherPageController;
use App\Http\Controllers\Student\SettingsController as StudentSettingsController;
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
    Route::get('/student/zoom-links', [StudentPageController::class, 'zoomLinks'])
        ->name('student.zoom-links');
    Route::get('/student/settings', [StudentSettingsController::class, 'edit'])
        ->name('student.settings');
    Route::put('/student/settings', [StudentSettingsController::class, 'update'])
        ->name('student.settings.update');
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

        Route::resource('courses', TeacherCourseController::class)
            ->except(['create', 'edit', 'show']);
        Route::resource('assignments', TeacherAssignmentController::class)
            ->except(['create', 'edit', 'show']);
        Route::resource('exams', TeacherExamController::class)
            ->except(['create', 'edit', 'show']);
        Route::resource('zoom-links', TeacherZoomLinkController::class)
            ->parameters(['zoom-links' => 'zoom_link'])
            ->except(['create', 'edit', 'show']);

        Route::get('/calendar', [TeacherPageController::class, 'calendar'])
            ->name('calendar');
        Route::get('/settings', [TeacherSettingsController::class, 'edit'])
            ->name('settings');
        Route::put('/settings', [TeacherSettingsController::class, 'update'])
            ->name('settings.update');
        Route::get('/help', [TeacherPageController::class, 'help'])
            ->name('help');
    });

require __DIR__.'/auth.php';
