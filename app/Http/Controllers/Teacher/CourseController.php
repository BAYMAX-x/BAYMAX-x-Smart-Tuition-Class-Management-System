<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::latest()->get();

        return view('teacher.pages.courses', compact('courses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Course::create($validated);

        return back()->with('status', 'Course added.');
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $course->update($validated);

        return back()->with('status', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return back()->with('status', 'Course removed.');
    }
}
