@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column gap-4">
        <div>
            <p class="text-uppercase text-emerald-600 small mb-1">{{ now()->format('l, F j') }}</p>
            <h2 class="h4 text-emerald-900 mb-1">System Settings</h2>
            <p class="text-slate-600 mb-0">Manage the system profile, academic info, and contact details.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success rounded-3 shadow-sm" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('teacher.settings.update') }}" class="d-flex flex-column gap-3">
            @csrf
            @method('PUT')

            <div class="soft-card p-4">
                <h5 class="text-emerald-900 mb-3">School Profile</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="school_name">School Name</label>
                        <input id="school_name" type="text" name="school_name" value="{{ old('school_name', $settings?->school_name) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="school_tagline">Tagline</label>
                        <input id="school_tagline" type="text" name="school_tagline" value="{{ old('school_tagline', $settings?->school_tagline) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label text-emerald-700 fw-semibold" for="address">Address</label>
                        <input id="address" type="text" name="address" value="{{ old('address', $settings?->address) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-emerald-700 fw-semibold" for="logo_url">Logo URL</label>
                        <input id="logo_url" type="url" name="logo_url" value="{{ old('logo_url', $settings?->logo_url) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                </div>
            </div>

            <div class="soft-card p-4">
                <h5 class="text-emerald-900 mb-3">Academic Settings</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label text-emerald-700 fw-semibold" for="academic_year">Academic Year</label>
                        <input id="academic_year" type="text" name="academic_year" value="{{ old('academic_year', $settings?->academic_year) }}"
                               class="form-control rounded-3 border-0 bg-white/70" placeholder="2024-2025">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-emerald-700 fw-semibold" for="term_label">Term Label</label>
                        <input id="term_label" type="text" name="term_label" value="{{ old('term_label', $settings?->term_label) }}"
                               class="form-control rounded-3 border-0 bg-white/70" placeholder="Term 1">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-emerald-700 fw-semibold" for="timezone">Timezone</label>
                        @php
                            $tz = old('timezone', $settings?->timezone);
                            $timezones = ['UTC', 'Asia/Colombo', 'Asia/Kolkata', 'Asia/Dhaka', 'Asia/Singapore', 'Europe/London', 'America/New_York'];
                        @endphp
                        <select id="timezone" name="timezone" class="form-select rounded-3 border-0 bg-white/70">
                            <option value="">Select timezone</option>
                            @foreach ($timezones as $zone)
                                <option value="{{ $zone }}" @selected($tz === $zone)>{{ $zone }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="soft-card p-4">
                <h5 class="text-emerald-900 mb-3">Contact</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="contact_email">Contact Email</label>
                        <input id="contact_email" type="email" name="contact_email" value="{{ old('contact_email', $settings?->contact_email) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-emerald-700 fw-semibold" for="contact_phone">Contact Phone</label>
                        <input id="contact_phone" type="text" name="contact_phone" value="{{ old('contact_phone', $settings?->contact_phone) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                    <div class="col-12">
                        <label class="form-label text-emerald-700 fw-semibold" for="footer_note">Footer Note</label>
                        <input id="footer_note" type="text" name="footer_note" value="{{ old('footer_note', $settings?->footer_note) }}"
                               class="form-control rounded-3 border-0 bg-white/70">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success rounded-pill px-4">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
