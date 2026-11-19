@extends('layouts.app')

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<!-- Hero Section -->
<section class="bg-navy text-white py-16 md:py-24 relative overflow-hidden"
         style="background-image: linear-gradient(rgba(15,30,54,0.92), rgba(15,30,54,0.92)), url('{{ asset('images/hero-plant-truck.png') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 relative z-10 text-center max-w-3xl">
        <span class="inline-block px-3 py-1 bg-blue/20 text-blue-light border border-blue-light/40 text-xs font-bold tracking-widest rounded-full uppercase mb-3 backdrop-blur-sm">
            {{ __('quality.hero_eyebrow') }}
        </span>
        <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
            {{ __('quality.hero_title') }}
        </h1>
        <p class="text-slate-300 text-base md:text-lg leading-relaxed">
            {{ __('quality.hero_desc') }}
        </p>
    </div>
</section>

<!-- 4-Step Quality Process (Clean White Background) -->
<section class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                PROCESS & TESTING
            </span>
            <h2 class="text-2xl md:text-4xl font-bold text-navy mb-4">
                {{ __('quality.process_title') }}
            </h2>
            <p class="text-slate-600 text-sm md:text-base">
                {{ __('quality.process_sub') }}
            </p>
            <div class="w-16 h-1 bg-blue mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="bg-surface rounded-2xl p-6 border-t-4 border-blue border-x border-b border-slate-200 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue text-white font-black text-xl rounded-xl flex items-center justify-center mb-6 shadow-sm">
                    {{ __('quality.step1_num') }}
                </div>
                <h3 class="text-lg font-bold text-navy mb-3">
                    {{ __('quality.step1_title') }}
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ __('quality.step1_desc') }}
                </p>
            </div>

            <!-- Step 2 -->
            <div class="bg-surface rounded-2xl p-6 border-t-4 border-blue-light border-x border-b border-slate-200 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-light text-navy font-black text-xl rounded-xl flex items-center justify-center mb-6 shadow-sm">
                    {{ __('quality.step2_num') }}
                </div>
                <h3 class="text-lg font-bold text-navy mb-3">
                    {{ __('quality.step2_title') }}
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ __('quality.step2_desc') }}
                </p>
            </div>

            <!-- Step 3 -->
            <div class="bg-surface rounded-2xl p-6 border-t-4 border-blue border-x border-b border-slate-200 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue text-white font-black text-xl rounded-xl flex items-center justify-center mb-6 shadow-sm">
                    {{ __('quality.step3_num') }}
                </div>
                <h3 class="text-lg font-bold text-navy mb-3">
                    {{ __('quality.step3_title') }}
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ __('quality.step3_desc') }}
                </p>
            </div>

            <!-- Step 4 -->
            <div class="bg-surface rounded-2xl p-6 border-t-4 border-navy border-x border-b border-slate-200 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-navy text-white font-black text-xl rounded-xl flex items-center justify-center mb-6 shadow-sm">
                    {{ __('quality.step4_num') }}
                </div>
                <h3 class="text-lg font-bold text-navy mb-3">
                    {{ __('quality.step4_title') }}
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ __('quality.step4_desc') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Actual Facilities with Real Photos (Light Surface Background) -->
<section class="py-16 md:py-20 bg-surface border-y border-slate-200">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                MANUFACTURING ASSETS
            </span>
            <h2 class="text-2xl md:text-4xl font-bold text-navy mb-4">
                {{ __('quality.facilities_title') }}
            </h2>
            <div class="w-16 h-1 bg-blue mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Facility 1: Drone Factory Plant -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition border border-slate-200">
                <div class="h-64 bg-slate-100 overflow-hidden relative">
                    <img src="{{ asset('images/drone-plant-overview.png') }}" alt="우성레미콘 공장 전경 드론 촬영" class="w-full h-full object-cover">
                    <span class="absolute bottom-3 right-3 bg-navy/90 backdrop-blur-sm text-blue-light text-xs px-2.5 py-1 rounded">
                        {{ $locale === 'en' ? 'Aerial Drone View' : '사업장 전경 항공 촬영' }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-2">{{ __('quality.facility_1_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ __('quality.facility_1_desc') }}</p>
                    <div class="flex items-center text-xs text-blue font-medium">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue mr-2"></span>
                        {{ $locale === 'en' ? 'Gangdong-myeon, Gangneung Production Facility' : '강릉시 강동면 생산 현장' }}
                    </div>
                </div>
            </div>

            <!-- Facility 2: Concrete Block Manufacturing Line -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition border border-slate-200">
                <div class="h-64 bg-slate-100 overflow-hidden relative">
                    <img src="{{ asset('images/automated-block-press.png') }}" alt="콘크리트 블록 자동 유압 설비" class="w-full h-full object-cover">
                    <span class="absolute bottom-3 right-3 bg-navy/90 backdrop-blur-sm text-blue-light text-xs px-2.5 py-1 rounded">
                        {{ $locale === 'en' ? 'Hydraulic Press Block Line' : '콘크리트 블록 성형 라인' }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-2">{{ __('quality.facility_3_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ __('quality.facility_3_desc') }}</p>
                    <div class="flex items-center text-xs text-blue font-medium">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue mr-2"></span>
                        {{ $locale === 'en' ? 'High-density vibro-compaction block machinery' : '고압 진동 압축 자동 성형 설비' }}
                    </div>
                </div>
            </div>

            <!-- Facility 3: Mixer Fleet & Transport -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition border border-slate-200">
                <div class="h-64 bg-slate-100 overflow-hidden relative">
                    <img src="{{ asset('images/hero-plant-truck.png') }}" alt="레미콘 배칭 플랜트 및 믹서 트럭단" class="w-full h-full object-cover">
                    <span class="absolute bottom-3 right-3 bg-navy/90 backdrop-blur-sm text-blue-light text-xs px-2.5 py-1 rounded">
                        {{ $locale === 'en' ? 'Transport Mixer Trucks' : '레미콘 믹서 트럭 수송단' }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-2">{{ __('quality.facility_4_title') }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ __('quality.facility_4_desc') }}</p>
                    <div class="flex items-center text-xs text-blue font-medium">
                        <span class="inline-block w-2 h-2 rounded-full bg-blue mr-2"></span>
                        {{ $locale === 'en' ? 'Prompt on-site dispatch' : '신속한 현장 도착 및 타설 지원' }}
                    </div>
                </div>
            </div>

            <!-- Facility 4: Quality Testing Lab -->
            <div class="bg-white rounded-2xl p-8 shadow-sm flex flex-col justify-center border-l-4 border-blue border-r border-t border-b border-slate-200">
                <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center font-bold text-xl mb-4 border border-sky-border">
                    🔬
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">{{ __('quality.facility_2_title') }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">{{ __('quality.facility_2_desc') }}</p>
                <ul class="space-y-2 text-sm text-slate-700">
                    <li class="flex items-center"><span class="text-blue mr-2 font-bold">✓</span> {{ $locale === 'en' ? '28-day compressive break test' : '28일 표준 양생 압축강도 측정' }}</li>
                    <li class="flex items-center"><span class="text-blue mr-2 font-bold">✓</span> {{ $locale === 'en' ? 'Slump & air-entrainment tests' : '슬럼프 및 공기량 실시간 측정' }}</li>
                    <li class="flex items-center"><span class="text-blue mr-2 font-bold">✓</span> {{ $locale === 'en' ? 'Chloride ion concentration monitoring' : '염분 농도 및 수질 정밀 분석' }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Standards & Certification Note (Deep Navy with Light Blue accents) -->
<section class="py-16 bg-navy text-white">
    <div class="container mx-auto px-4 max-w-4xl text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-white">{{ __('quality.cert_title') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left mb-8">
            <div class="bg-white/5 p-6 rounded-2xl border border-slate-700">
                <h4 class="text-blue-light font-bold text-base mb-2">{{ __('quality.cert_ks_title') }}</h4>
                <p class="text-slate-300 text-sm leading-relaxed">{{ __('quality.cert_ks_desc') }}</p>
            </div>
            <div class="bg-white/5 p-6 rounded-2xl border border-slate-700">
                <h4 class="text-blue-light font-bold text-base mb-2">{{ __('quality.cert_safety_title') }}</h4>
                <p class="text-slate-300 text-sm leading-relaxed">{{ __('quality.cert_safety_desc') }}</p>
            </div>
        </div>
        <p class="text-xs text-slate-400 italic">{{ __('quality.cert_note') }}</p>

        <div class="mt-8">
            <a href="{{ route('contact') }}" class="btn-primary">
                {{ __('products.inquiry_btn') }}
            </a>
        </div>
    </div>
</section>
@endsection