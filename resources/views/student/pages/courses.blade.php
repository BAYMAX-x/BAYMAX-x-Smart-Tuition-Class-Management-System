@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Courses</h2>
            <p class="text-slate-600 mb-0">Your enrolled courses appear below.</p>
        </div>

        <div class="row g-3">
            @forelse ($courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-2">
                        <p class="text-uppercase text-emerald-600 small mb-0">Course</p>
                        <h3 class="h5 text-emerald-900 mb-1">{{ $course->title }}</h3>
                        <p class="text-slate-600 mb-0">{{ $course->description ?? 'No description yet.' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">No courses yet. Check back after your teacher enrolls you.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
