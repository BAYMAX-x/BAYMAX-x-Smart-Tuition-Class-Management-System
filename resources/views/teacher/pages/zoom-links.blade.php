@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">Zoom Links</h2>
            <p class="text-slate-600 mb-0">Share meeting links with students.</p>
        </div>

        <div class="soft-card p-4">
            <h5 class="text-emerald-900 mb-3">Add Zoom Link</h5>
            <form class="row g-3" method="POST" action="{{ route('teacher.zoom-links.store') }}">
                @csrf
                <div class="col-md-4">
                    <label class="form-label text-emerald-700 fw-semibold" for="title">Title</label>
                    <input id="title" type="text" name="title" class="form-control rounded-3 border-0 bg-white/70" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label text-emerald-700 fw-semibold" for="meeting_url">Zoom URL</label>
                    <input id="meeting_url" type="url" name="meeting_url" class="form-control rounded-3 border-0 bg-white/70" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label text-emerald-700 fw-semibold" for="passcode">Passcode</label>
                    <input id="passcode" type="text" name="passcode" class="form-control rounded-3 border-0 bg-white/70">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button class="btn btn-success rounded-pill w-100" type="submit">Add</button>
                </div>
            </form>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-3 shadow-sm" role="alert">{{ session('status') }}</div>
        @endif

        <div class="row g-3">
            @forelse ($links as $link)
                <div class="col-md-6 col-lg-4">
                    <div class="soft-card p-4 h-100 d-flex flex-column gap-3">
                        <form class="d-flex flex-column gap-3" method="POST" action="{{ route('teacher.zoom-links.update', $link) }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <p class="text-uppercase text-emerald-600 small mb-1">Title</p>
                                <input type="text" name="title" value="{{ $link->title }}" class="form-control rounded-3 border-0 bg-white/70 fw-semibold" required>
                            </div>
                            <div>
                                <p class="text-uppercase text-emerald-600 small mb-1">Zoom URL</p>
                                <input type="url" name="meeting_url" value="{{ $link->meeting_url }}" class="form-control rounded-3 border-0 bg-white/70" required>
                            </div>
                            <div>
                                <p class="text-uppercase text-emerald-600 small mb-1">Passcode</p>
                                <input type="text" name="passcode" value="{{ $link->passcode }}" class="form-control rounded-3 border-0 bg-white/70">
                            </div>
                            <button type="submit" class="btn btn-outline-success rounded-pill w-100 mt-auto">Save</button>
                        </form>
                        <form method="POST" action="{{ route('teacher.zoom-links.destroy', $link) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill w-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="soft-card p-4 text-slate-600">No Zoom links yet.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
