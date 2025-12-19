<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(): View
    {
        $exams = Exam::latest()->get();

        return view('teacher.pages.exams', compact('exams'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'exam_date' => ['nullable', 'date'],
            'paper_url' => ['nullable', 'url'],
        ]);

        if (!empty($validated['paper_url'])) {
            $paperUrl = $validated['paper_url'];
            if (!str_starts_with($paperUrl, 'http://') && !str_starts_with($paperUrl, 'https://')) {
                $validated['paper_url'] = 'https://'.$paperUrl;
            }
        }

        Exam::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'exam_date' => $validated['exam_date'] ?? null,
            'paper_url' => $validated['paper_url'] ?? null,
        ]);

        return back()->with('status', 'Exam added.');
    }

    public function update(Request $request, Exam $exam): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'exam_date' => ['nullable', 'date'],
            'paper_url' => ['nullable', 'url'],
        ]);

        if (!empty($validated['paper_url'])) {
            $paperUrl = $validated['paper_url'];
            if (!str_starts_with($paperUrl, 'http://') && !str_starts_with($paperUrl, 'https://')) {
                $validated['paper_url'] = 'https://'.$paperUrl;
            }
        }

        $exam->fill([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'exam_date' => $validated['exam_date'] ?? null,
            'paper_url' => $validated['paper_url'] ?? null,
        ]);

        $exam->save();

        return back()->with('status', 'Exam updated.');
    }

    public function destroy(Exam $exam): RedirectResponse
    {
        $exam->delete();

        return back()->with('status', 'Exam removed.');
    }
}
