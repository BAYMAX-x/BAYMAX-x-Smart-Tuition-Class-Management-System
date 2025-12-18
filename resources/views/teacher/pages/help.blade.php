@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-3">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Help & Support</h2>
            <p class="text-slate-600 mb-0">Get assistance or contact support.</p>
        </div>
        <div class="soft-card p-4">
            <p class="mb-0 text-slate-700">Support resources will be provided here.</p>
        </div>
    </div>
@endsection
