@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Zoom Links</h2>
            <p class="text-slate-600 mb-0">Join live sessions shared by your teacher.</p>
        </div>

        <div class="row g-3">
            @forelse ($links as $link)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-2">
                        <p class="text-uppercase text-emerald-600 small mb-0">Live Session</p>
                        <h3 class="h5 text-emerald-900 mb-1">{{ $link->title }}</h3>
                        <p class="text-slate-600 mb-0">Passcode: {{ $link->passcode ?? '—' }}</p>
                        <a href="{{ $link->meeting_url }}" target="_blank" class="btn btn-outline-success rounded-pill mt-2">Join Meeting</a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">No Zoom links shared yet.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
