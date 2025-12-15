<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class TeacherDashboardController extends Controller
{
    /**
     * Display the teacher/admin dashboard with quick insights.
     */
    public function index(): View
    {
        $students = User::where('is_teacher', false)->latest()->take(5)->get();

        return view('teacher.dashboard', [
            'students' => $students,
            'studentCount' => User::where('is_teacher', false)->count(),
            'teacherCount' => User::where('is_teacher', true)->count(),
        ]);
    }
}
