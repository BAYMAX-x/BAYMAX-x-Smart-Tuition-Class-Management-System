@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto space-y-6">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="text-sm text-emerald-500 mb-1">Student Management</p>
                <h2 class="h3 text-emerald-900 mb-0">Edit Student</h2>
                <p class="text-slate-600 mb-0">Update student details. Leave the password blank to keep the current one.</p>
            </div>
            <a class="btn btn-outline-success rounded-pill" href="{{ route('teacher.students.index') }}">Back to list</a>
        </div>

        <div class="soft-card p-5">
            <form method="POST" action="{{ route('teacher.students.update', $student) }}" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="full_name" class="form-label fw-semibold text-emerald-800">Full Name *</label>
                        <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $student->full_name ?? $student->name) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                        @error('full_name')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-semibold text-emerald-800">Email *</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $student->email) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                        @error('email')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-semibold text-emerald-800">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone', $student->phone) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('phone')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label fw-semibold text-emerald-800">Address</label>
                        <input id="address" name="address" type="text" value="{{ old('address', $student->address) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('address')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="grade" class="form-label fw-semibold text-emerald-800">Grade</label>
                        <input id="grade" name="grade" type="text" value="{{ old('grade', $student->grade) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('grade')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="school_name" class="form-label fw-semibold text-emerald-800">School Name</label>
                        <input id="school_name" name="school_name" type="text" value="{{ old('school_name', $student->school_name) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('school_name')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="guardian_name" class="form-label fw-semibold text-emerald-800">Guardian Name</label>
                        <input id="guardian_name" name="guardian_name" type="text" value="{{ old('guardian_name', $student->guardian_name) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('guardian_name')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="guardian_phone" class="form-label fw-semibold text-emerald-800">Guardian Phone</label>
                        <input id="guardian_phone" name="guardian_phone" type="text" value="{{ old('guardian_phone', $student->guardian_phone) }}"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('guardian_phone')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-semibold text-emerald-800">New Password</label>
                        <input id="password" name="password" type="password"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                        @error('password')
                            <p class="text-sm text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-semibold text-emerald-800">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                    </div>
                </div>

                <div class="d-flex gap-3 mt-3">
                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2">Save Changes</button>
                    <a href="{{ route('teacher.students.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
