<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignmentController extends Controller
{
    public function index(): View
    {
        $assignments = Assignment::latest()->get();

        return view('teacher.pages.assignments', compact('assignments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date'],
            'resource_url' => ['nullable', 'url'],
        ]);

        Assignment::create($validated);

        return back()->with('status', 'Assignment added.');
    }

    public function update(Request $request, Assignment $assignment): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date'],
            'resource_url' => ['nullable', 'url'],
        ]);

        $assignment->update($validated);

        return back()->with('status', 'Assignment updated.');
    }

    public function destroy(Assignment $assignment): RedirectResponse
    {
        $assignment->delete();

        return back()->with('status', 'Assignment removed.');
    }
}
