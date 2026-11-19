@extends('layouts.app')

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<!-- Hero Section -->
<section class="bg-navy text-white py-16 md:py-20 text-center relative overflow-hidden"
         style="background-image: linear-gradient(rgba(15,30,54,0.92), rgba(15,30,54,0.92)), url('{{ asset('images/hero-plant-truck.png') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 max-w-3xl relative z-10">
        <span class="inline-block px-3 py-1 bg-blue/20 text-blue-light border border-blue-light/40 text-xs font-bold tracking-widest rounded-full uppercase mb-3 backdrop-blur-sm">
            {{ __('contact.hero_eyebrow') }}
        </span>
        <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
            {{ __('contact.hero_title') }}
        </h1>
        <p class="text-slate-300 text-base md:text-lg leading-relaxed">
            {{ __('contact.hero_desc') }}
        </p>
    </div>
</section>

<!-- Main Contact Section (Light Surface Background) -->
<section class="py-16 md:py-20 bg-surface">
    <div class="container mx-auto px-4 max-w-6xl">
        
        @if(session('success'))
            <div class="mb-8 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-900 p-6 rounded-2xl shadow-sm">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <div>
                        <h4 class="font-bold text-lg mb-1">{{ $locale === 'en' ? 'Submission Received' : '문의가 접수되었습니다' }}</h4>
                        <p class="text-sm text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Column: Contact Info Cards -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                        DIRECT CONTACT
                    </span>
                    <h2 class="text-2xl font-bold text-navy mb-4">{{ __('contact.info_title') }}</h2>
                    <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                        {{ $locale === 'en' 
                            ? 'Call or visit our Gangneung plant for direct order arrangement and supply schedule inquiries.' 
                            : '강릉 사업장 방문 및 유선 연락을 통해 신속한 제품 주문 및 타설 일정 상담이 가능합니다.' }}
                    </p>
                </div>

                <!-- Card 1: Telephone -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-xl flex-shrink-0 border border-sky-border">
                        📞
                    </div>
                    <div>
                        <h4 class="text-xs uppercase font-bold text-slate-500 mb-1">{{ __('contact.phone_label') }}</h4>
                        <a href="tel:033-644-5677" class="text-xl font-black text-navy hover:text-blue transition block">
                            033-644-5677
                        </a>
                        <span class="text-xs text-slate-500 block mt-1">
                            {{ __('contact.alt_phone_label') }}: <a href="tel:033-644-5515" class="hover:underline text-navy font-semibold">033-644-5515</a>
                        </span>
                    </div>
                </div>

                <!-- Card 2: Address -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-xl flex-shrink-0 border border-sky-border">
                        📍
                    </div>
                    <div>
                        <h4 class="text-xs uppercase font-bold text-slate-500 mb-1">{{ __('contact.address_label') }}</h4>
                        <p class="text-sm font-bold text-navy leading-snug">
                            {{ $locale === 'en' ? '104 Oidong-gil, Gangdong-myeon, Gangneung-si, Gangwon State' : '강원특별자치도 강릉시 강동면 오이동길 104' }}
                        </p>
                        <p class="text-xs text-slate-500 mt-1">{{ __('contact.address_zip') }} (산성우리 106-1)</p>
                    </div>
                </div>

                <!-- Card 3: Business Hours -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-xl flex-shrink-0 border border-sky-border">
                        ⏰
                    </div>
                    <div>
                        <h4 class="text-xs uppercase font-bold text-slate-500 mb-1">{{ __('contact.hours_label') }}</h4>
                        <p class="text-sm text-slate-800 leading-snug">{{ __('contact.hours_val') }}</p>
                        <p class="text-xs text-blue font-semibold mt-1">
                            {{ $locale === 'en' ? 'Early-morning pour schedule coordination available' : '새벽/야간 타설 사전 조율 가능' }}
                        </p>
                    </div>
                </div>

                <!-- Card 4: Email -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-start space-x-4">
                    <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-xl flex-shrink-0 border border-sky-border">
                        ✉️
                    </div>
                    <div>
                        <h4 class="text-xs uppercase font-bold text-slate-500 mb-1">{{ __('contact.email_label') }}</h4>
                        <a href="mailto:info@woosung-remicon.kr" class="text-sm font-bold text-navy hover:text-blue transition">
                            info@woosung-remicon.kr
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Inquiry Form -->
            <div class="lg:col-span-7">
                <div class="bg-white p-8 md:p-10 rounded-2xl shadow-sm border border-slate-200">
                    <h3 class="text-xl font-bold text-navy mb-2">{{ __('contact.form_title') }}</h3>
                    <p class="text-slate-500 text-xs mb-8">{{ __('contact.form_sub') }}</p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Row 1: Name & Phone -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_name') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" required value="{{ old('name') }}"
                                       placeholder="{{ __('contact.field_name_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                                @error('name')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_phone') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" name="phone" required value="{{ old('phone') }}"
                                       placeholder="{{ __('contact.field_phone_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                                @error('phone')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 2: Company & Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_company') }}
                                </label>
                                <input type="text" name="company" value="{{ old('company') }}"
                                       placeholder="{{ __('contact.field_company_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_email') }}
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       placeholder="{{ __('contact.field_email_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                                @error('email')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Row 3: Product Type & Quantity -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_product') }}
                                </label>
                                <select name="product_type" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm bg-white">
                                    <option value="">{{ __('contact.field_product_opt_default') }}</option>
                                    <option value="remicon" {{ old('product_type', request('product_id') ? 'product_' . request('product_id') : '') === 'remicon' ? 'selected' : '' }}>
                                        {{ __('contact.field_product_opt_remicon') }}
                                    </option>
                                    <option value="retaining_wall">보강토 옹벽블록</option>
                                    <option value="paving">보도·경관블록 (인터로킹)</option>
                                    <option value="revetment">호안·환경식생블록</option>
                                    <option value="ascon">{{ __('contact.field_product_opt_ascon') }}</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_qty') }}
                                </label>
                                <input type="text" name="quantity" value="{{ old('quantity') }}"
                                       placeholder="{{ __('contact.field_qty_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                            </div>
                        </div>

                        <!-- Row 4: Delivery Address & Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_address') }}
                                </label>
                                <input type="text" name="delivery_address" value="{{ old('delivery_address') }}"
                                       placeholder="{{ __('contact.field_address_ph') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                    {{ __('contact.field_date') }}
                                </label>
                                <input type="date" name="preferred_date" value="{{ old('preferred_date') }}"
                                       class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">
                                {{ __('contact.field_message') }} <span class="text-red-500">*</span>
                            </label>
                            <textarea name="message" rows="4" required
                                      placeholder="{{ __('contact.field_message_ph') }}"
                                      class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue focus:border-transparent text-sm">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Privacy consent -->
                        <div class="flex items-start space-x-2">
                            <input type="checkbox" id="privacy" required class="mt-1 rounded text-blue focus:ring-blue">
                            <label for="privacy" class="text-xs text-slate-600 cursor-pointer">
                                {{ __('contact.privacy_agree') }}
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-navy hover:bg-blue text-white font-bold py-4 rounded-xl transition duration-200 text-sm shadow-md">
                                {{ __('contact.submit_btn') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kakao Map Embed & Navigation Link (Pure White Background) -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                LOCATION & MAP
            </span>
            <h2 class="text-2xl md:text-3xl font-bold text-navy mb-2">{{ __('contact.map_title') }}</h2>
            <p class="text-slate-600 text-sm">{{ __('contact.map_desc') }}</p>
        </div>

        <!-- Kakao Map Container -->
        <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200 bg-slate-100">
            <div class="relative w-full h-96 flex flex-col items-center justify-center text-center p-6"
                 style="background-image: linear-gradient(rgba(15,30,54,0.85), rgba(15,30,54,0.85)), url('{{ asset('images/company-headquarters.png') }}'); background-size: cover; background-position: center;">
                <div class="w-16 h-16 bg-blue rounded-full flex items-center justify-center text-white text-2xl font-bold shadow-lg mb-4 ring-4 ring-white/20 animate-bounce">
                    📍
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-2">우성레미콘(주) 본사 및 강릉 공장</h3>
                <p class="text-slate-200 text-sm mb-6 max-w-lg">
                    강원특별자치도 강릉시 강동면 오이동길 104 (산성우리 106-1)
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://map.kakao.com/link/search/강릉시 강동면 오이동길 104" target="_blank"
                       class="inline-flex items-center space-x-2 bg-blue hover:bg-blue/90 text-white font-bold px-6 py-3 rounded-xl shadow-md transition">
                        <span>🗺️</span>
                        <span>{{ __('contact.map_open_kakao') }}</span>
                    </a>
                    <a href="https://map.naver.com/v5/search/강릉시 강동면 오이동길 104" target="_blank"
                       class="inline-flex items-center space-x-2 bg-[#03C75A] hover:bg-[#03C75A]/90 text-white font-bold px-6 py-3 rounded-xl shadow-md transition">
                        <span>🟢</span>
                        <span>{{ __('contact.map_open_naver') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection