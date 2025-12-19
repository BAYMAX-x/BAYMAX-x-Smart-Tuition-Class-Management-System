@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">My Settings</h2>
            <p class="text-slate-600 mb-0">Update your profile and login details.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-3 shadow-sm" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('student.settings.update') }}" class="d-flex flex-column gap-3">
            @csrf
            @method('PUT')

            <div class="soft-card p-4">
                <h5 class="text-emerald-900 mb-3">Profile</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="full_name">Full Name</label>
                        <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $student->full_name ?? $student->name) }}"
                               class="form-control rounded-3 border-0 bg-white/70" required>
                        @error('full_name')
                            <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $student->email) }}"
                               class="form-control rounded-3 border-0 bg-white/70" required>
                        @error('email')
                            <p class="text-danger small mt-1 mb-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', $student->phone) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="address">Address</label>
                        <input id="address" type="text" name="address" value="{{ old('address', $student->address) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                </div>
            </div>

            <div class="soft-card p-4">
                <h5 class="text-emerald-900 mb-3">Guardian</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="guardian_name">Guardian Name</label>
                        <input id="guardian_name" type="text" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="guardian_phone">Guardian Phone</label>
                        <input id="guardian_phone" type="text" name="guardian_phone" value="{{ old('guardian_phone', $student->guardian_phone) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success rounded-pill px-4">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
