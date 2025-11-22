<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Smart Tuition CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <style>
        body {
            background: linear-gradient(180deg, #dff5eb 0%, #fdfdf7 60%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-10 px-4 text-slate-700">
    <div class="max-w-5xl w-full bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl grid lg:grid-cols-2 gap-8 p-8 border border-emerald-50">
        <div class="flex flex-col gap-4 justify-center">
            <p class="text-sm uppercase tracking-wide text-emerald-500">Student Enrollment</p>
            <h1 class="text-3xl font-bold text-emerald-900">Smart Tuition Class Management System</h1>
            <p class="leading-relaxed text-slate-600">
                Fill in the registration form to create your student profile. After a quick sign-up,
                you'll be redirected to your personalized dashboard to see upcoming modules and announcements.
            </p>
            <div class="flex items-center gap-4 bg-emerald-50 rounded-2xl p-4">
                <div class="h-12 w-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                    ST
                </div>
                <p class="text-emerald-700 font-medium mb-0">Seamless admissions + one login for everything.</p>
            </div>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-800 font-semibold transition">
                Already registered? Login here
                <span aria-hidden="true">→</span>
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4 bg-[#f6fff6] rounded-2xl p-6 shadow-inner">
            @csrf
            <h2 class="text-2xl font-semibold text-emerald-900 mb-1">Create Student Account</h2>
            <p class="text-sm text-slate-500 mb-3">All highlighted (*) fields are required.</p>

            <div>
                <label for="full_name" class="form-label fw-semibold text-emerald-800">Full Name *</label>
                <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}"
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                @error('full_name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="form-label fw-semibold text-emerald-800">Email *</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="form-label fw-semibold text-emerald-800">Phone</label>
                <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                @error('phone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="address" class="form-label fw-semibold text-emerald-800">Address</label>
                <textarea id="address" name="address" rows="2"
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="grade" class="form-label fw-semibold text-emerald-800">Grade</label>
                    <input id="grade" name="grade" type="text" value="{{ old('grade') }}"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                    @error('grade')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="school_name" class="form-label fw-semibold text-emerald-800">School Name</label>
                    <input id="school_name" name="school_name" type="text" value="{{ old('school_name') }}"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                    @error('school_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="guardian_name" class="form-label fw-semibold text-emerald-800">Guardian Name</label>
                    <input id="guardian_name" name="guardian_name" type="text" value="{{ old('guardian_name') }}"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                    @error('guardian_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="guardian_phone" class="form-label fw-semibold text-emerald-800">Guardian Phone</label>
                    <input id="guardian_phone" name="guardian_phone" type="text" value="{{ old('guardian_phone') }}"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                    @error('guardian_phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="password" class="form-label fw-semibold text-emerald-800">Password *</label>
                    <input id="password" name="password" type="password"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label fw-semibold text-emerald-800">Confirm Password *</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400" required>
                </div>
            </div>

            <button type="submit"
                class="w-100 btn btn-success btn-lg rounded-3xl shadow-lg mt-4 py-3">
                Create Student Account
            </button>
        </form>
    </div>
</body>
</html>
