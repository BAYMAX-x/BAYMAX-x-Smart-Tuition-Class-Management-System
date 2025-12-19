<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(Request $request): View
    {
        return view('student.pages.settings', [
            'student' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $student = $request->user();

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($student->id),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_phone' => ['nullable', 'string', 'max:20'],
        ]);

        $student->fill([
            'name' => $validated['full_name'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_phone' => $validated['guardian_phone'] ?? null,
        ]);

        $student->save();

        return back()->with('status', 'Profile updated.');
    }
}
