<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display the student dashboard after login.
     */
    public function index(): View
    {
        return view('student.dashboard', [
            'student' => Auth::user(),
        ]);
    }
}
