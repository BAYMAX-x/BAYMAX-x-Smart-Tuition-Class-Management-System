@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
                <h2 class="h3 text-emerald-900 mb-1">Teacher Dashboard</h2>
                <p class="text-slate-600 mb-0">Manage students, monitor enrollment, and keep dashboards active.</p>
            </div>
            <div class="d-flex gap-2">
                <a class="btn btn-success rounded-pill px-3 shadow-sm" href="{{ route('teacher.students.create') }}">Add Student</a>
                <a class="btn btn-outline-success rounded-pill px-3" href="{{ route('teacher.students.index') }}">Manage Students</a>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Total Students</p>
                    <p class="h3 text-emerald-900 mb-2">{{ $studentCount }}</p>
                    <p class="mb-0 text-slate-600">Active student accounts.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100">
                    <p class="text-uppercase text-emerald-600 small mb-1">Teachers</p>
                    <p class="h3 text-emerald-900 mb-2">{{ $teacherCount }}</p>
                    <p class="mb-0 text-slate-600">Accounts with teacher access.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="soft-card p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <p class="text-uppercase text-emerald-600 small mb-1">Quick Action</p>
                        <p class="h4 text-emerald-900 mb-2">Add new student</p>
                        <p class="text-slate-600 mb-3">Create a new account so students can log in immediately.</p>
                    </div>
                    <a class="btn btn-success rounded-pill w-100" href="{{ route('teacher.students.create') }}">Create Account</a>
                </div>
            </div>
        </div>

        <div class="soft-card p-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <div>
                    <p class="text-uppercase text-emerald-600 small mb-1">Recent Students</p>
                    <h3 class="h5 text-emerald-900 mb-0">Latest student signups</h3>
                </div>
                <a class="btn btn-outline-success rounded-pill px-3" href="{{ route('teacher.students.index') }}">View all</a>
            </div>
            @if ($students->isEmpty())
                <p class="text-slate-600 mb-0">No students added yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-emerald-700">
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grade</th>
                                <th scope="col">School</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="fw-semibold text-emerald-900">{{ $student->full_name ?? $student->name }}</td>
                                    <td class="text-slate-700">{{ $student->email }}</td>
                                    <td class="text-slate-700">{{ $student->grade ?? 'N/A' }}</td>
                                    <td class="text-slate-700">{{ $student->school_name ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
