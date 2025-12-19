@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Exams</h2>
            <p class="text-slate-600 mb-0">Exam schedules and papers.</p>
        </div>

        <div class="row g-3">
            @forelse ($exams as $exam)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-2">
                        <p class="text-uppercase text-emerald-600 small mb-0">Exam</p>
                        <h3 class="h5 text-emerald-900 mb-1">{{ $exam->title }}</h3>
                        <p class="text-slate-600 mb-0">Date: {{ $exam->exam_date ?? 'Not set' }}</p>
                        @if ($exam->paper_url)
                            <a href="{{ $exam->paper_url }}" target="_blank" class="text-emerald-700 fw-semibold mt-2">View Paper</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">No exams to show yet.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
