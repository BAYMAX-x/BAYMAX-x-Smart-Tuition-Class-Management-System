@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
                <h2 class="h3 text-emerald-900 mb-1">Dashboard Overview</h2>
                <p class="text-slate-600 mb-0">
                    Welcome back! Review upcoming sessions, quick stats, and personalized announcements tailored to your learning journey.
                </p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-success rounded-pill px-3 shadow-sm">View Courses</button>
                <button class="btn btn-outline-success rounded-pill px-3">Check Assignments</button>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Current Grade</p>
                    <p class="h4 text-emerald-900 mb-2">{{ $student->grade ?? 'Not set' }}</p>
                    <p class="mb-0 text-slate-600">We’ll keep this updated as your profile evolves.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Guardian</p>
                    <p class="h4 text-emerald-900 mb-2">{{ $student->guardian_name ?? 'Not provided' }}</p>
                    <p class="mb-0 text-slate-600">Contact: {{ $student->guardian_phone ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100 d-flex align-items-center justify-content-between">
                    <div>
                        <p class="text-uppercase text-emerald-600 small mb-1">Profile</p>
                        <p class="h4 text-emerald-900 mb-0">{{ $student->full_name ?? $student->name }}</p>
                        <p class="text-slate-600 mb-0">{{ $student->email }}</p>
                    </div>
                    <div class="rounded-circle bg-emerald-100 text-emerald-800 d-flex align-items-center justify-content-center fw-bold" style="width:64px;height:64px;">
                        {{ strtoupper(substr($student->full_name ?? $student->name, 0, 2)) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="soft-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <div>
                    <p class="text-uppercase text-emerald-600 small mb-1">Student Profile</p>
                    <h3 class="h5 text-emerald-900 mb-0">Details at a glance</h3>
                </div>
                <button class="btn btn-outline-success rounded-pill px-3">Update Info</button>
            </div>
            <div class="row g-3 text-slate-700">
                <div class="col-md-6">
                    <div class="p-3 rounded-3 bg-white h-100 border border-emerald-50">
                        <p class="small text-emerald-600 mb-1">Email</p>
                        <p class="mb-0 fw-semibold">{{ $student->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3 bg-white h-100 border border-emerald-50">
                        <p class="small text-emerald-600 mb-1">Phone</p>
                        <p class="mb-0 fw-semibold">{{ $student->phone ?? 'Not provided' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3 bg-white h-100 border border-emerald-50">
                        <p class="small text-emerald-600 mb-1">School</p>
                        <p class="mb-0 fw-semibold">{{ $student->school_name ?? 'Not provided' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3 bg-white h-100 border border-emerald-50">
                        <p class="small text-emerald-600 mb-1">Address</p>
                        <p class="mb-0 fw-semibold">{{ $student->address ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Courses</p>
                    <p class="mb-2 text-slate-700">Your enrolled courses will appear here.</p>
                    <button class="btn btn-outline-success rounded-pill px-3">View Courses</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Assignments</p>
                    <p class="mb-2 text-slate-700">Track deadlines and submissions in one spot.</p>
                    <button class="btn btn-outline-success rounded-pill px-3">Open Assignments</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Announcements</p>
                    <p class="mb-2 text-slate-700">Stay updated with your class announcements.</p>
                    <button class="btn btn-outline-success rounded-pill px-3">View Announcements</button>
                </div>
            </div>
        </div>
    </div>
@endsection
