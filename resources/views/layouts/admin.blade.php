<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('admin.dashboard')) | 우성레미콘 Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:        '#0F1E36',
                        'navy-dark': '#091321',
                        blue:        '#0284C7',
                        'blue-light':'#38BDF8',
                        'sky-soft':  '#F0F9FF',
                        'sky-border':'#BAE6FD',
                        surface:     '#F8FAFC',
                        offwhite:    '#FFFFFF',
                        dark:        '#1E293B',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Noto Sans KR', 'Inter', sans-serif; }</style>
</head>
<body class="bg-surface min-h-screen">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-navy text-white flex-shrink-0 overflow-y-auto">
            <div class="p-5 border-b border-slate-700 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2.5">
                    <img src="{{ asset('images/logo.png') }}" alt="우성레미콘" class="h-9 w-auto object-contain bg-white rounded-lg p-0.5">
                    <span class="font-bold text-sm leading-tight text-white">
                        {{ app()->getLocale() === 'en' ? 'Woosung' : '우성레미콘' }}<br>
                        <span class="text-xs text-blue-light font-normal">Admin System</span>
                    </span>
                </a>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                    📊 {{ __('admin.dashboard') }}
                </a>
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                    🏗️ {{ __('admin.products') }}
                </a>
                <a href="{{ route('admin.inquiries.index') }}" class="sidebar-link {{ request()->routeIs('admin.inquiries.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                    📩 {{ __('admin.inquiries') }}
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="sidebar-link {{ request()->routeIs('admin.announcements.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                    📢 {{ __('admin.announcements') }}
                </a>

                <div class="pt-3 border-t border-slate-700">
                    <p class="text-xs text-slate-400 uppercase tracking-wide mb-2 px-3">{{ __('admin.settings') }}</p>
                    <a href="{{ route('admin.page-content.index') }}" class="sidebar-link {{ request()->routeIs('admin.page-content.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                        📄 {{ __('admin.page_content') }}
                    </a>
                    <a href="{{ route('admin.seo.index') }}" class="sidebar-link {{ request()->routeIs('admin.seo.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                        🔍 {{ __('admin.seo') }}
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                        ⚙️ {{ __('admin.settings') }}
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'bg-blue text-white' : 'text-slate-300 hover:text-white hover:bg-white/10' }}">
                        👤 {{ __('admin.users') }}
                    </a>
                </div>

                <div class="pt-3 border-t border-slate-700">
                    <a href="{{ route('home') }}" target="_blank" class="sidebar-link text-slate-400 hover:text-white">
                        🌐 {{ app()->getLocale() === 'en' ? 'View Website' : '웹사이트 바로가기' }} ↗
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="sidebar-link w-full text-left text-red-400 hover:text-red-300">
                            🚪 {{ __('admin.logout') }}
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top bar -->
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between flex-shrink-0 border-b border-slate-200">
                <h1 class="text-lg font-bold text-navy">@yield('title', __('admin.dashboard'))</h1>

                <div class="flex items-center space-x-4">
                    <!-- Admin Language Switcher -->
                    <div class="flex items-center space-x-1 border border-slate-200 rounded-lg p-0.5 bg-slate-50">
                        <a href="{{ route('lang.switch', 'ko') }}"
                           class="px-2.5 py-1 text-xs font-bold rounded transition {{ app()->getLocale() === 'ko' ? 'bg-blue text-white shadow-sm' : 'text-slate-600 hover:bg-white' }}">한국어</a>
                        <a href="{{ route('lang.switch', 'en') }}"
                           class="px-2.5 py-1 text-xs font-bold rounded transition {{ app()->getLocale() === 'en' ? 'bg-blue text-white shadow-sm' : 'text-slate-600 hover:bg-white' }}">English</a>
                    </div>

                    <!-- User info -->
                    <div class="text-xs text-slate-500">
                        <span class="font-bold text-navy">{{ auth()->user()->name ?? 'Administrator' }}</span>
                    </div>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-1 overflow-y-auto p-6 bg-surface">
                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-lg shadow-sm text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-sm text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <style>
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.625rem 0.875rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.15s ease-in-out;
        }
    </style>
</body>
</html>