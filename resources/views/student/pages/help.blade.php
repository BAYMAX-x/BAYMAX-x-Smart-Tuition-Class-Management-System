@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-3">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Help & Support</h2>
            <p class="text-slate-600 mb-0">Need assistance? Reach out to your teacher or support desk.</p>
        </div>
        <div class="soft-card p-4">
            <p class="mb-0 text-slate-700">Support content will appear here.</p>
        </div>
    </div>
@endsection
