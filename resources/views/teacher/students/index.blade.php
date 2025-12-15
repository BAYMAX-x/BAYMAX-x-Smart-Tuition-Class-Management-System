@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto space-y-6">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <p class="text-sm text-emerald-500 mb-1">Student Management</p>
                <h2 class="h3 text-emerald-900 mb-0">Students</h2>
                <p class="text-slate-600 mb-0">Add, update, or remove student accounts. Only students (not teachers) appear here.</p>
            </div>
            <a class="btn btn-success rounded-pill shadow-sm" href="{{ route('teacher.students.create') }}">Add Student</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-3 shadow-sm mb-0" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="soft-card p-0">
            @if ($students->isEmpty())
                <div class="p-5">
                    <p class="text-slate-600 mb-2">No students found.</p>
                    <a class="btn btn-success rounded-pill" href="{{ route('teacher.students.create') }}">Add first student</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-emerald-700">
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Grade</th>
                                <th scope="col">School</th>
                                <th scope="col">Guardian</th>
                                <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="fw-semibold text-emerald-900">{{ $student->full_name ?? $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->grade ?? 'N/A' }}</td>
                                    <td>{{ $student->school_name ?? 'N/A' }}</td>
                                    <td>{{ $student->guardian_name ?? 'N/A' }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-outline-success rounded-pill me-2" href="{{ route('teacher.students.edit', $student) }}">Edit</a>
                                        <form action="{{ route('teacher.students.destroy', $student) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Delete this student?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3">
                    {{ $students->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
