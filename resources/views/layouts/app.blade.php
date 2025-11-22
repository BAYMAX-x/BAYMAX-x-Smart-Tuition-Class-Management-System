<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Smart Tuition Class Management System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap 5 CDN so we can mix classes with Tailwind -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

    <style>
        body {
            background: radial-gradient(circle at top, #e3f3ed, #fdfefb 55%);
        }

        .nav-soft {
            box-shadow: 0 15px 45px rgba(29, 78, 61, 0.15);
        }

        .soft-card {
            border-radius: 24px;
            box-shadow: 0 15px 50px rgba(26, 67, 52, 0.1);
            background: linear-gradient(135deg, #f6fff6, #ecf8f2);
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800">
    <div class="min-h-screen flex flex-col">
        <nav class="nav-soft bg-white/80 backdrop-blur-md border-b border-green-50 sticky top-0 z-50">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-wrap items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-emerald-100 to-emerald-200 flex items-center justify-center text-emerald-700 font-bold">
                        ST
                    </div>
                    <div>
                        <p class="text-sm uppercase tracking-wide text-emerald-500">Smart Tuition</p>
                        <p class="text-xl font-semibold text-emerald-900">Class Management System</p>
                    </div>
                </div>

                @auth
                    <div class="flex items-center gap-3">
                        <p class="text-emerald-800 font-medium mb-0">
                            {{ auth()->user()->full_name ?? auth()->user()->name }}
                        </p>
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-success d-flex align-items-center gap-2 px-4 py-2 rounded-pill text-sm shadow-sm hover:shadow-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M5.25 3a.75.75 0 00-.75.75v16.5c0 .414.336.75.75.75H12a.75.75 0 000-1.5H6V4.5h6a.75.75 0 000-1.5H5.25zm11.03 4.22a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 01-1.06-1.06L18.44 12l-2.16-2.22a.75.75 0 010-1.06zm-8.03 2.03a.75.75 0 000 1.5h8.25a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>

        <main class="flex-1 py-8 px-4 sm:px-8 lg:px-10">
            @yield('content')
        </main>
    </div>
</body>
</html>
