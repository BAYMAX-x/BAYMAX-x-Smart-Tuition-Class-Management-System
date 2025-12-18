<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class StudentPageController extends Controller
{
    public function courses(): View
    {
        return view('student.pages.courses');
    }

    public function assignments(): View
    {
        return view('student.pages.assignments');
    }

    public function exams(): View
    {
        return view('student.pages.exams');
    }

    public function calendar(): View
    {
        return view('student.pages.calendar');
    }

    public function settings(): View
    {
        return view('student.pages.settings');
    }

    public function help(): View
    {
        return view('student.pages.help');
    }
}
