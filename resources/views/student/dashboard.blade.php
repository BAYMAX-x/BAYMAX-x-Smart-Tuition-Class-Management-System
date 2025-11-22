@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto space-y-8">
        <div class="rounded-3xl bg-gradient-to-br from-emerald-50 via-emerald-100 to-white p-8 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 shadow-xl">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-emerald-500">Student Portal</p>
                <h2 class="text-3xl font-semibold text-emerald-900">Welcome, {{ $student->full_name ?? $student->name }}</h2>
                <p class="text-slate-600 mt-3 leading-relaxed">
                    Your personalized hub for upcoming classes, announcements, and exam performance. We’ll keep enriching this
                    space — stay tuned!
                </p>
            </div>
            <div class="flex items-center gap-4 bg-white/80 rounded-3xl px-6 py-4 shadow-inner border border-emerald-100">
                <div class="h-16 w-16 rounded-full bg-gradient-to-br from-emerald-200 to-emerald-300 flex items-center justify-center text-2xl font-bold text-emerald-800">
                    {{ strtoupper(substr($student->full_name ?? $student->name, 0, 2)) }}
                </div>
                <div>
                    <p class="text-sm text-emerald-500">Current Grade</p>
                    <p class="text-xl font-semibold text-emerald-900">{{ $student->grade ?? 'Not set' }}</p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-[280px,1fr] gap-8">
            <aside class="soft-card p-6 space-y-5">
                <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Quick Links</p>
                <div class="space-y-3">
                    <button class="w-full flex items-center gap-3 bg-white rounded-2xl px-4 py-3 text-left text-emerald-800 font-semibold shadow-sm">
                        <span class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700">
                            🧭
                        </span>
                        Dashboard
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-3 text-left text-slate-500 hover:text-emerald-700 rounded-2xl transition">
                        <span class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600">
                            📚
                        </span>
                        Courses
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-3 text-left text-slate-500 hover:text-emerald-700 rounded-2xl transition">
                        <span class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600">
                            📝
                        </span>
                        Assignments
                    </button>
                    <button class="w-full flex items-center gap-3 px-4 py-3 text-left text-slate-500 hover:text-emerald-700 rounded-2xl transition">
                        <span class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600">
                            📢
                        </span>
                        Announcements
                    </button>
                </div>
            </aside>

            <section class="space-y-6">
                <div class="soft-card p-6">
                    <h3 class="text-xl font-semibold text-emerald-900 mb-4">Student Profile</h3>
                    <div class="grid md:grid-cols-2 gap-5 text-slate-700">
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Full Name</p>
                            <p class="text-lg font-medium">{{ $student->full_name }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Email</p>
                            <p class="text-lg font-medium">{{ $student->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Phone</p>
                            <p class="text-lg font-medium">{{ $student->phone ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">School</p>
                            <p class="text-lg font-medium">{{ $student->school_name ?? 'Not provided' }}</p>
                        </div>
                    </div>
                    <div class="mt-4 grid md:grid-cols-2 gap-5 text-slate-700">
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Guardian Name</p>
                            <p class="text-lg font-medium">{{ $student->guardian_name ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <p class="text-xs uppercase text-emerald-500 tracking-[0.4em]">Guardian Phone</p>
                            <p class="text-lg font-medium">{{ $student->guardian_phone ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="soft-card p-5 flex flex-col gap-2">
                        <h4 class="text-lg font-semibold text-emerald-900">My Classes (Coming Soon)</h4>
                        <p class="text-sm text-slate-500">We are curating your enrolled classes.</p>
                    </div>
                    <div class="soft-card p-5 flex flex-col gap-2">
                        <h4 class="text-lg font-semibold text-emerald-900">My Exam Results (Coming Soon)</h4>
                        <p class="text-sm text-slate-500">Track performance and improvements here.</p>
                    </div>
                    <div class="soft-card p-5 flex flex-col gap-2">
                        <h4 class="text-lg font-semibold text-emerald-900">Announcements (Coming Soon)</h4>
                        <p class="text-sm text-slate-500">Important notices will appear shortly.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
