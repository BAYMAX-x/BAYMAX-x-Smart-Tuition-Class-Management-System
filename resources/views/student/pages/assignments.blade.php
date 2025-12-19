@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Assignments</h2>
            <p class="text-slate-600 mb-0">Track deadlines and submissions here.</p>
        </div>

        <div class="row g-3">
            @forelse ($assignments as $assignment)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-2">
                        <p class="text-uppercase text-emerald-600 small mb-0">Assignment</p>
                        <h3 class="h5 text-emerald-900 mb-1">{{ $assignment->title }}</h3>
                        <p class="text-slate-600 mb-0">Due: {{ $assignment->due_date ?? 'Not set' }}</p>
                        @if ($assignment->resource_url)
                            <a href="{{ $assignment->resource_url }}" target="_blank" class="text-emerald-700 fw-semibold mt-2">Open Resource</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">You do not have assignments yet.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
