@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
                <h2 class="h4 text-emerald-900 mb-1">Courses</h2>
                <p class="text-slate-600 mb-0">Create and manage courses.</p>
            </div>
        </div>

        <div class="soft-card p-4">
            <h5 class="text-emerald-900 mb-3">Add New Course</h5>
            <form class="row g-3" method="POST" action="{{ route('teacher.courses.store') }}">
                @csrf
                <div class="col-md-5">
                    <label class="form-label text-emerald-700 fw-semibold" for="title">Title</label>
                    <input id="title" type="text" name="title" class="form-control rounded-3 border-0 bg-white/70" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label text-emerald-700 fw-semibold" for="description">Description</label>
                    <input id="description" type="text" name="description" class="form-control rounded-3 border-0 bg-white/70">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-success rounded-pill w-100" type="submit">Add Course</button>
                </div>
            </form>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-3 shadow-sm" role="alert">{{ session('status') }}</div>
        @endif

        <div class="row g-3">
            @forelse ($courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-3">
                        <form class="d-flex flex-column gap-3" method="POST" action="{{ route('teacher.courses.update', $course) }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <p class="text-uppercase text-emerald-600 small mb-1">Course</p>
                                <input type="text" name="title" value="{{ $course->title }}" class="form-control rounded-3 border-0 bg-white/70 fw-semibold" required>
                            </div>
                            <div>
                                <p class="text-uppercase text-emerald-600 small mb-1">Description</p>
                                <input type="text" name="description" value="{{ $course->description }}" class="form-control rounded-3 border-0 bg-white/70">
                            </div>
                            <button type="submit" class="btn btn-outline-success rounded-pill w-100 mt-auto">Save</button>
                        </form>
                        <form method="POST" action="{{ route('teacher.courses.destroy', $course) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill w-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">No courses yet.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
