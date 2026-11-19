<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $locale = app()->getLocale();
        $seoTitle = isset($seo) ? $seo->meta_title : (($locale === 'en') ? 'Woosung Remicon Co., Ltd. | Ready-Mixed Concrete & Blocks' : '우성레미콘(주) | 강릉 레미콘 · 콘크리트 블록 전문');
        $seoDesc  = isset($seo) ? $seo->meta_description : '';
    @endphp

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDesc }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @if(isset($seo) && $seo->og_image)
    <meta property="og:image" content="{{ asset($seo->og_image) }}">
    @endif
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDesc }}">
    <meta property="og:type" content="website">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:        '#0F1E36',  // Deep corporate Navy
                        'navy-dark': '#091321',  // Top bar dark tone
                        blue:        '#0284C7',  // Primary Light/Sky Blue
                        'blue-light':'#38BDF8',  // Crisp vivid light blue
                        'sky-soft':  '#F0F9FF',  // Very soft light blue tint
                        'sky-border':'#BAE6FD',  // Light blue border
                        surface:     '#F8FAFC',  // Clean light surface
                        offwhite:    '#FFFFFF',  // Pure white primary
                        dark:        '#1E293B',  // Slate-800 text
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts: Noto Sans KR + Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;600;700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Noto Sans KR', 'Inter', -apple-system, sans-serif; }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #0284C7;
            color: #FFFFFF;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 6px rgba(2, 132, 199, 0.25);
        }
        .btn-primary:hover {
            background-color: #0369A1;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.35);
            transform: translateY(-1px);
        }
        .btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #38BDF8;
            color: #FFFFFF;
            background-color: rgba(2, 132, 199, 0.15);
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-outline:hover {
            background-color: #0284C7;
            color: #FFFFFF;
            border-color: #0284C7;
        }
        .btn-navy {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #0F1E36;
            color: #FFFFFF;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }
        .btn-navy:hover {
            background-color: #0284C7;
        }
    </style>
</head>
<body class="bg-white text-dark min-h-screen flex flex-col">

    <!-- Top Info Bar (Phone, Address, Admin shortcut) -->
    <div class="bg-navy-dark text-slate-300 text-xs py-2 px-4 border-b border-slate-800">
        <div class="container mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center space-x-4">
                <span class="flex items-center space-x-1.5">
                    <span class="text-blue-light">📍</span>
                    <span>{{ $locale === 'en' ? '104 Oidong-gil, Gangdong-myeon, Gangneung-si' : '강원특별자치도 강릉시 강동면 오이동길 104' }}</span>
                </span>
                <span class="hidden sm:inline text-slate-700">|</span>
                <span class="hidden sm:flex items-center space-x-1.5">
                    <span class="text-blue-light">⏰</span>
                    <span>{{ $locale === 'en' ? 'Mon-Fri 08:00 - 18:00' : '평일 08:00 ~ 18:00' }}</span>
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="tel:033-644-5677" class="text-blue-light font-bold hover:text-white transition flex items-center space-x-1">
                    <span>📞</span>
                    <span>033-644-5677</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-white transition">
                    ⚙️ {{ $locale === 'en' ? 'Admin Panel' : '관리자' }}
                </a>
            </div>
        </div>
    </div>

    <!-- Main Header & Navigation Menu Bar (Crisp White + Navy + Light Blue) -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-slate-200">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="우성레미콘(주)" class="h-11 w-auto object-contain">
                    <div>
                        <span class="text-navy font-extrabold text-xl tracking-tight block leading-tight">
                            @if($locale === 'en')
                                Woosung Remicon
                            @else
                                우성레미콘<span class="text-xs text-blue font-semibold ml-1">(주)</span>
                            @endif
                        </span>
                        <span class="text-[10px] text-slate-500 font-medium uppercase tracking-widest block">
                            {{ $locale === 'en' ? 'Concrete & Block Mfg.' : '레미콘 · 콘크리트 블록 제조업' }}
                        </span>
                    </div>
                </a>

                <!-- Desktop / Tablet Main Menu Bar -->
                <nav class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-blue bg-sky-soft border border-sky-border' : 'text-slate-700 hover:text-blue hover:bg-sky-soft' }}">
                        {{ $locale === 'en' ? 'Home' : '홈' }}
                    </a>
                    <a href="{{ route('about') }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-blue bg-sky-soft border border-sky-border' : 'text-slate-700 hover:text-blue hover:bg-sky-soft' }}">
                        {{ $locale === 'en' ? 'About Us' : '회사소개' }}
                    </a>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('products.*') ? 'text-blue bg-sky-soft border border-sky-border' : 'text-slate-700 hover:text-blue hover:bg-sky-soft' }}">
                        {{ $locale === 'en' ? 'Products' : '제품안내' }}
                    </a>
                    <a href="{{ route('quality') }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('quality') ? 'text-blue bg-sky-soft border border-sky-border' : 'text-slate-700 hover:text-blue hover:bg-sky-soft' }}">
                        {{ $locale === 'en' ? 'Quality & Plant' : '품질관리' }}
                    </a>
                    <a href="{{ route('contact') }}"
                       class="px-4 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('contact') ? 'text-blue bg-sky-soft border border-sky-border' : 'text-slate-700 hover:text-blue hover:bg-sky-soft' }}">
                        {{ $locale === 'en' ? 'Location & Quote' : '오시는 길' }}
                    </a>
                </nav>

                <!-- Right Side Actions: Language Switcher + Quote CTA -->
                <div class="hidden sm:flex items-center space-x-3">
                    <!-- Language Toggle Buttons -->
                    <div class="inline-flex rounded-lg border border-slate-200 bg-slate-50 p-0.5">
                        <a href="{{ route('lang.switch', 'ko') }}"
                           class="px-2.5 py-1 text-xs font-bold rounded transition {{ $locale === 'ko' ? 'bg-blue text-white shadow-sm' : 'text-slate-600 hover:text-navy' }}">
                            KO
                        </a>
                        <a href="{{ route('lang.switch', 'en') }}"
                           class="px-2.5 py-1 text-xs font-bold rounded transition {{ $locale === 'en' ? 'bg-blue text-white shadow-sm' : 'text-slate-600 hover:text-navy' }}">
                            EN
                        </a>
                    </div>

                    <!-- Quote CTA Button -->
                    <a href="{{ route('contact') }}"
                       class="bg-navy hover:bg-blue text-white text-xs font-bold px-4 py-2.5 rounded-lg transition shadow-sm flex items-center space-x-1.5">
                        <span>📋</span>
                        <span>{{ $locale === 'en' ? 'Request Quote' : '견적 의뢰' }}</span>
                    </a>
                </div>

                <!-- Mobile Menu Hamburger Button -->
                <button id="mobile-menu-btn"
                        class="lg:hidden p-2 rounded-lg text-slate-700 hover:bg-slate-100 focus:outline-none"
                        aria-label="Toggle navigation menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Collapsible Menu Bar -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-200 px-4 py-4 space-y-2">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('home') ? 'bg-blue text-white' : 'text-slate-700 hover:bg-slate-50' }}">
                🏠 {{ $locale === 'en' ? 'Home' : '홈' }}
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('about') ? 'bg-blue text-white' : 'text-slate-700 hover:bg-slate-50' }}">
                🏢 {{ $locale === 'en' ? 'About Us' : '회사소개' }}
            </a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('products.*') ? 'bg-blue text-white' : 'text-slate-700 hover:bg-slate-50' }}">
                🏗️ {{ $locale === 'en' ? 'Products' : '제품안내' }}
            </a>
            <a href="{{ route('quality') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('quality') ? 'bg-blue text-white' : 'text-slate-700 hover:bg-slate-50' }}">
                🔬 {{ $locale === 'en' ? 'Quality & Facilities' : '품질관리' }}
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('contact') ? 'bg-blue text-white' : 'text-slate-700 hover:bg-slate-50' }}">
                📍 {{ $locale === 'en' ? 'Location & Inquiries' : '오시는 길 / 견적 문의' }}
            </a>

            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                <div class="flex space-x-2">
                    <a href="{{ route('lang.switch', 'ko') }}" class="px-3 py-1.5 text-xs font-bold rounded {{ $locale === 'ko' ? 'bg-blue text-white' : 'bg-slate-100 text-slate-700' }}">한국어</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 text-xs font-bold rounded {{ $locale === 'en' ? 'bg-blue text-white' : 'bg-slate-100 text-slate-700' }}">English</a>
                </div>
                <a href="{{ route('admin.login') }}" class="text-xs text-slate-500 hover:text-navy font-semibold">
                    ⚙️ {{ $locale === 'en' ? 'Admin' : '관리자' }}
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer (Deep Navy + White + Light Blue) -->
    <footer class="bg-navy text-slate-300 border-t border-slate-800 mt-auto">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Col 1: Brand -->
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="우성레미콘" class="h-10 w-auto object-contain bg-white rounded-lg p-1">
                        <span class="text-white font-bold text-lg">
                            {{ $locale === 'en' ? 'Woosung Remicon Co., Ltd.' : '우성레미콘(주)' }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        {{ $locale === 'en'
                            ? 'Specializing in ready-mixed concrete and concrete block manufacturing in Gangwon State since 1999.'
                            : '1999년 창립 이래 강원도 강릉 및 동해 지역에 고품질 레미콘과 콘크리트 블록을 전문 공급하고 있습니다.' }}
                    </p>
                    <div class="text-xs text-blue-light font-medium">
                        KS F 4009 / KS F 4004
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3 uppercase tracking-wider">
                        {{ $locale === 'en' ? 'Quick Navigation' : '바로가기' }}
                    </h4>
                    <ul class="text-xs space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-light transition">→ {{ $locale === 'en' ? 'Home' : '홈' }}</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-blue-light transition">→ {{ $locale === 'en' ? 'About Us' : '회사소개' }}</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-blue-light transition">→ {{ $locale === 'en' ? 'Products' : '제품소개' }}</a></li>
                        <li><a href="{{ route('quality') }}" class="hover:text-blue-light transition">→ {{ $locale === 'en' ? 'Quality & Facilities' : '품질관리' }}</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-blue-light transition">→ {{ $locale === 'en' ? 'Contact & Directions' : '오시는 길' }}</a></li>
                        <li><a href="{{ route('admin.login') }}" class="text-slate-500 hover:text-white transition">→ {{ $locale === 'en' ? 'Admin Login' : '관리자 로그인' }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact Details -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3 uppercase tracking-wider">
                        {{ $locale === 'en' ? 'Contact & Inquiries' : '고객 문의 및 안내' }}
                    </h4>
                    <ul class="text-xs space-y-2 text-slate-400">
                        <li><strong class="text-white">대표전화:</strong> <a href="tel:033-644-5677" class="text-blue-light font-bold hover:underline">033-644-5677</a></li>
                        <li><strong class="text-white">공장/영업:</strong> <a href="tel:033-644-5515" class="hover:underline text-slate-300">033-644-5515</a></li>
                        <li><strong class="text-white">이메일:</strong> info@woosung-remicon.kr</li>
                        <li><strong class="text-white">운영시간:</strong> 평일 08:00 ~ 18:00</li>
                    </ul>
                </div>

                <!-- Col 4: Location Address -->
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3 uppercase tracking-wider">
                        {{ $locale === 'en' ? 'Factory & Office' : '공장 및 본사' }}
                    </h4>
                    <p class="text-xs text-slate-400 leading-relaxed mb-3">
                        {{ $locale === 'en'
                            ? '104 Oidong-gil, Gangdong-myeon, Gangneung-si, Gangwon State, Republic of Korea (Postal: 25630)'
                            : '강원특별자치도 강릉시 강동면 오이동길 104 (우편번호: 25630)' }}
                    </p>
                    <a href="https://map.kakao.com/link/search/강릉시 강동면 오이동길 104" target="_blank"
                       class="inline-block bg-white/10 hover:bg-blue hover:text-white text-xs text-slate-200 font-semibold px-3 py-1.5 rounded transition">
                        🗺️ {{ $locale === 'en' ? 'Open in Kakao Map' : '카카오맵 길찾기' }}
                    </a>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-10 pt-6 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <div>
                    © {{ date('Y') }} {{ $locale === 'en' ? 'Woosung Remicon Co., Ltd.' : '우성레미콘(주)' }} All rights reserved.
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="hover:text-slate-400">{{ $locale === 'en' ? 'Privacy Policy' : '개인정보처리방침' }}</a>
                    <span>|</span>
                    <a href="{{ route('contact') }}" class="hover:text-slate-400">{{ $locale === 'en' ? 'Contact Us' : '고객센터' }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('mobile-menu-btn');
            var menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>