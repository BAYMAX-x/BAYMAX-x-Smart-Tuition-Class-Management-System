<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - Smart Tuition CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <style>
        body {
            background: radial-gradient(circle at 20% 20%, #e6f7ef, #fbfffb 60%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-12 text-slate-700">
    <div class="max-w-3xl w-full bg-white/85 backdrop-blur-xl rounded-3xl shadow-2xl border border-emerald-50 grid lg:grid-cols-2 gap-6 p-8">
        <div class="space-y-4 hidden lg:flex flex-col justify-center">
            <span class="text-sm uppercase tracking-[0.3em] text-emerald-500">Smart Tuition</span>
            <h1 class="text-3xl font-bold text-emerald-900">Student Login</h1>
            <p class="text-slate-600">Use your email and password to get into the platform and see your dashboard.</p>
            <div class="flex items-center gap-3 bg-emerald-50 rounded-2xl p-4">
                <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold">
                    ST
                </div>
                <p class="text-emerald-800 font-medium mb-0">Unified dashboard with assignments, announcements, and more.</p>
            </div>
            <p class="text-emerald-700 font-semibold">Accounts are created by teachers. Ask your teacher to add you.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="bg-[#f6fff6] rounded-2xl p-6 shadow-inner space-y-4">
            @csrf
            <h2 class="text-2xl font-semibold text-emerald-900 mb-2">Welcome Back!</h2>
            <p class="text-sm text-slate-500">Your teacher creates your login. Use the email and password they shared with you.</p>

            <div>
                <label for="email" class="form-label fw-semibold text-emerald-800">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="form-label fw-semibold text-emerald-800">Password</label>
                <input id="password" name="password" type="password" required
                    class="form-control rounded-2xl border-0 bg-white/70 focus:ring-2 focus:ring-emerald-400">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input rounded-pill border-emerald-300" type="checkbox" value="1" id="remember" name="remember">
                <label class="form-check-label text-sm text-slate-600" for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" class="w-100 btn btn-success btn-lg rounded-3xl shadow-lg py-3">
                Login
            </button>
        </form>
    </div>
</body>
</html>
