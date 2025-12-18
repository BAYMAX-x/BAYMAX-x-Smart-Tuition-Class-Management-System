<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class TeacherPageController extends Controller
{
    public function courses(): View
    {
        return view('teacher.pages.courses');
    }

    public function assignments(): View
    {
        return view('teacher.pages.assignments');
    }

    public function exams(): View
    {
        return view('teacher.pages.exams');
    }

    public function calendar(): View
    {
        return view('teacher.pages.calendar');
    }

    public function settings(): View
    {
        return view('teacher.pages.settings');
    }

    public function help(): View
    {
        return view('teacher.pages.help');
    }
}
