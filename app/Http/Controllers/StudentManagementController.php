<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\View;

class StudentManagementController extends Controller
{
    public function index(): View
    {
        $students = User::where('is_teacher', false)
            ->latest()
            ->paginate(10);

        return view('teacher.students.index', compact('students'));
    }

    public function create(): View
    {
        return view('teacher.students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateStudent($request, true);

        User::create([
            'name' => $validated['full_name'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'grade' => $validated['grade'] ?? null,
            'school_name' => $validated['school_name'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_phone' => $validated['guardian_phone'] ?? null,
            'is_teacher' => false,
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('teacher.students.index')
            ->with('status', 'Student account created successfully.');
    }

    public function edit(int $id): View
    {
        $student = $this->findStudentOrFail($id);

        return view('teacher.students.edit', compact('student'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $student = $this->findStudentOrFail($id);

        $validated = $this->validateStudent($request, false, $student->id);

        $student->fill([
            'name' => $validated['full_name'],
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'grade' => $validated['grade'] ?? null,
            'school_name' => $validated['school_name'] ?? null,
            'guardian_name' => $validated['guardian_name'] ?? null,
            'guardian_phone' => $validated['guardian_phone'] ?? null,
        ]);

        if (!empty($validated['password'])) {
            $student->password = Hash::make($validated['password']);
        }

        $student->save();

        return redirect()
            ->route('teacher.students.index')
            ->with('status', 'Student updated successfully.');
    }

    public function editPassword(int $id): View
    {
        $student = $this->findStudentOrFail($id);

        return view('teacher.students.password', compact('student'));
    }

    public function updatePassword(Request $request, int $id): RedirectResponse
    {
        $student = $this->findStudentOrFail($id);

        $validated = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()->min(8)],
        ]);

        $student->password = Hash::make($validated['password']);
        $student->save();

        return redirect()
            ->route('teacher.students.index')
            ->with('status', 'Password updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $student = $this->findStudentOrFail($id);
        $student->delete();

        return redirect()
            ->route('teacher.students.index')
            ->with('status', 'Student removed.');
    }

    private function validateStudent(Request $request, bool $isCreate = true, ?int $ignoreId = null): array
    {
        $passwordRules = $isCreate
            ? ['required', 'confirmed', Rules\Password::defaults()->min(8)]
            : ['nullable', 'confirmed', Rules\Password::defaults()->min(8)];

        return $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($ignoreId),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'grade' => ['nullable', 'string', 'max:50'],
            'school_name' => ['nullable', 'string', 'max:255'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_phone' => ['nullable', 'string', 'max:20'],
            'password' => $passwordRules,
        ]);
    }

    private function findStudentOrFail(int $id): User
    {
        return User::where('id', $id)
            ->where('is_teacher', false)
            ->firstOrFail();
    }
}
