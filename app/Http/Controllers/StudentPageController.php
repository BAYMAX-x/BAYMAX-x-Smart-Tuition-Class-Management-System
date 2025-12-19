<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Assignment;
use App\Models\Exam;
use App\Models\ZoomLink;
use Illuminate\Contracts\View\View;

class StudentPageController extends Controller
{
    public function courses(): View
    {
        return view('student.pages.courses', [
            'courses' => Course::latest()->get(),
        ]);
    }

    public function assignments(): View
    {
        return view('student.pages.assignments', [
            'assignments' => Assignment::latest()->get(),
        ]);
    }

    public function exams(): View
    {
        return view('student.pages.exams', [
            'exams' => Exam::latest()->get(),
        ]);
    }

    public function calendar(): View
    {
        return view('student.pages.calendar');
    }

    public function zoomLinks(): View
    {
        return view('student.pages.zoom-links', [
            'links' => ZoomLink::latest()->get(),
        ]);
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
