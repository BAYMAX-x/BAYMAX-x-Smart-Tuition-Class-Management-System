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
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #f1fbf5 0%, #e5f5ed 100%);
            border-right: 1px solid #d7efe3;
            padding: 24px 12px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .brand-circle {
            height: 52px;
            width: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, #d6f5e3, #b8ead2);
            display: grid;
            place-items: center;
            color: #115e34;
            font-weight: 700;
        }

        .nav-link {
            color: #155e3d;
            font-weight: 600;
            background: transparent;
            border: 1px solid transparent;
        }

        .nav-link.active {
            background: #1d9c6b;
            color: #f3fff9;
            border-color: #178a5c;
            box-shadow: 0 10px 30px rgba(23, 138, 92, 0.25);
        }

        .nav-link:hover {
            background: #e6f7ee;
        }

        .topbar {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2f1e8;
        }

        .content-surface {
            background: linear-gradient(180deg, #fdfefc 0%, #f3fbf7 100%);
            border-radius: 28px;
            padding: 28px;
            min-height: 70vh;
            border: 1px solid #e5f2ea;
        }

        .soft-card {
            border-radius: 20px;
            box-shadow: 0 12px 40px rgba(26, 67, 52, 0.12);
            background: linear-gradient(135deg, #f6fff6, #ebf7f0);
            border: 1px solid #def0e4;
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800" style="background: radial-gradient(circle at 15% 20%, #e8f7ef, #f7fffb 60%);">
    <div class="d-flex min-vh-100">
        @auth
            <aside class="sidebar shadow-lg">
                <div class="d-flex align-items-center gap-3 mb-4 px-3">
                    <div class="brand-circle">ST</div>
                    <div>
                        <p class="text-uppercase text-emerald-600 small mb-1">Smart Tuition</p>
                        <p class="fw-semibold text-emerald-900 mb-0">Class Management</p>
                    </div>
                </div>

                @php
                    $isTeacher = auth()->user()->is_teacher ?? false;
                    $navItems = $isTeacher
                        ? [
                            ['label' => 'Dashboard', 'route' => 'teacher.dashboard', 'icon' => '🏠', 'active' => 'teacher.dashboard'],
                            ['label' => 'Students', 'route' => 'teacher.students.index', 'icon' => '👥', 'active' => 'teacher.students.*'],
                            ['label' => 'Add Student', 'route' => 'teacher.students.create', 'icon' => '➕', 'active' => 'teacher.students.create'],
                            ['label' => 'Courses', 'route' => 'teacher.courses', 'icon' => '📚', 'active' => 'teacher.courses'],
                            ['label' => 'Assignments', 'route' => 'teacher.assignments', 'icon' => '📝', 'active' => 'teacher.assignments'],
                            ['label' => 'Exams', 'route' => 'teacher.exams', 'icon' => '🧭', 'active' => 'teacher.exams'],
                            ['label' => 'Calendar', 'route' => 'teacher.calendar', 'icon' => '📅', 'active' => 'teacher.calendar'],
                        ]
                        : [
                            ['label' => 'Dashboard', 'route' => 'student.dashboard', 'icon' => '🏠', 'active' => 'student.dashboard'],
                            ['label' => 'Courses', 'route' => 'student.courses', 'icon' => '📚', 'active' => 'student.courses'],
                            ['label' => 'Assignments', 'route' => 'student.assignments', 'icon' => '📝', 'active' => 'student.assignments'],
                            ['label' => 'Exams', 'route' => 'student.exams', 'icon' => '🧭', 'active' => 'student.exams'],
                            ['label' => 'Calendar', 'route' => 'student.calendar', 'icon' => '📅', 'active' => 'student.calendar'],
                        ];
                @endphp

                <nav class="nav flex-column gap-2 px-2">
                    @foreach ($navItems as $item)
                        @php
                            $activePattern = $item['active'] ?? $item['route'];
                            $isActive = $activePattern ? request()->routeIs($activePattern) : false;
                        @endphp
                        <a
                            class="nav-link d-flex align-items-center gap-3 py-2 px-3 rounded-3 {{ $isActive ? 'active' : '' }}"
                            href="{{ $item['route'] ? route($item['route']) : '#' }}"
                        >
                            <span class="fs-6">{{ $item['icon'] }}</span>
                            <span class="fw-semibold">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>

                <div class="mt-auto px-3 pb-4">
                    <div class="small text-emerald-700 fw-semibold mb-2">Settings</div>
                    <div class="d-flex flex-column gap-2">
                        <a class="btn btn-light border-0 text-start rounded-3 py-2 px-3 text-slate-700"
                           href="{{ $isTeacher ? route('teacher.settings') : route('student.settings') }}">System Settings</a>
                        <a class="btn btn-light border-0 text-start rounded-3 py-2 px-3 text-slate-700"
                           href="{{ $isTeacher ? route('teacher.help') : route('student.help') }}">Help & Support</a>
                    </div>
                </div>
            </aside>
        @endauth

        <div class="flex-fill d-flex flex-column">
            <header class="topbar d-flex align-items-center justify-content-between px-4 py-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="small text-emerald-700 fw-semibold text-uppercase tracking-wide">Today</div>
                    <div class="text-slate-600">{{ now()->format('l, F j') }}</div>
                </div>
                @auth
                    <div class="d-flex align-items-center gap-3">
                        <div class="text-end">
                            <p class="mb-0 fw-semibold text-emerald-900">{{ auth()->user()->full_name ?? auth()->user()->name }}</p>
                            <p class="mb-0 text-slate-500 small">{{ (auth()->user()->is_teacher ?? false) ? 'Teacher' : 'Student' }}</p>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-success rounded-pill px-3 py-2 shadow-sm">Logout</button>
                        </form>
                    </div>
                @endauth
            </header>

            <main class="flex-fill py-4 px-4 px-md-5">
                <div class="content-surface shadow-lg">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
