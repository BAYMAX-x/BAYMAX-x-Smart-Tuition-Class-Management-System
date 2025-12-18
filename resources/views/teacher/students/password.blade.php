@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="text-sm text-emerald-500 mb-1">Student Management</p>
                <h2 class="h3 text-emerald-900 mb-0">Reset Password</h2>
                <p class="text-slate-600 mb-0">Set a new password for {{ $student->full_name ?? $student->name }}.</p>
            </div>
            <a class="btn btn-outline-success rounded-pill" href="{{ route('teacher.students.index') }}">Back to list</a>
        </div>

        <div class="soft-card p-5">
            <form method="POST" action="{{ route('teacher.students.password.update', $student) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-semibold text-emerald-800">New Password *</label>
                        <input id="password" name="password" type="password"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                        @error('password')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-semibold text-emerald-800">Confirm Password *</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                    </div>
                </div>

                <div class="d-flex gap-3 mt-3">
                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2">Save Password</button>
                    <a href="{{ route('teacher.students.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
