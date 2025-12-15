<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $this->ensureTeacher();

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->ensureTeacher();

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'grade' => ['nullable', 'string', 'max:50'],
            'school_name' => ['nullable', 'string', 'max:255'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()->min(8)],
        ]);

        $user = User::create([
            'name' => $validated['full_name'], // Keep default column in sync
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

        event(new Registered($user));

        return redirect()
            ->route('register')
            ->with('status', 'Student account created. They can now log in.');
    }

    /**
     * Limit registration to teacher/admin accounts.
     */
    private function ensureTeacher(): void
    {
        abort_unless(Auth::user()?->is_teacher, 403, 'Only teachers can register student accounts.');
    }
}
