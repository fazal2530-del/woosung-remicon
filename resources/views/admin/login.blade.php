<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('admin.login') }} | 우성레미콘</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:        '#0F1E36',
                        blue:        '#0284C7',
                        'blue-light':'#38BDF8',
                        'sky-soft':  '#F0F9FF',
                        surface:     '#F8FAFC',
                        dark:        '#1E293B',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Noto Sans KR', sans-serif; }</style>
</head>
<body class="bg-navy min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 md:p-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="우성레미콘" class="h-16 w-auto object-contain mx-auto mb-3">
            <h1 class="text-2xl font-bold text-navy">우성레미콘(주)</h1>
            <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Management Administration</p>

            <!-- Language Switcher in Login -->
            <div class="flex justify-center space-x-2 mt-4">
                <a href="{{ route('lang.switch', 'ko') }}" class="text-xs px-2.5 py-1 rounded {{ app()->getLocale() === 'ko' ? 'bg-navy text-white font-bold' : 'text-gray-500 hover:bg-gray-100' }}">한국어</a>
                <a href="{{ route('lang.switch', 'en') }}" class="text-xs px-2.5 py-1 rounded {{ app()->getLocale() === 'en' ? 'bg-navy text-white font-bold' : 'text-gray-500 hover:bg-gray-100' }}">English</a>
            </div>
        </div>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">{{ __('admin.inq_email') }}</label>
                <input type="email" name="email" required value="{{ old('email', 'admin@woosung-remicon.kr') }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">{{ app()->getLocale() === 'en' ? 'Password' : '비밀번호' }}</label>
                <input type="password" name="password" required value="admin1234"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div class="flex items-center justify-between text-xs text-gray-600">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded text-blue focus:ring-blue">
                    <span>{{ app()->getLocale() === 'en' ? 'Remember login' : '로그인 유지' }}</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-navy hover:bg-blue text-white font-bold py-3.5 rounded-lg transition text-sm shadow-md">
                {{ __('admin.login') }}
            </button>
        </form>

        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-navy transition">
                ← {{ app()->getLocale() === 'en' ? 'Back to Website' : '홈페이지로 돌아가기' }}
            </a>
        </div>
    </div>

</body>
</html>
