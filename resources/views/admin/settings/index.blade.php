@extends('layouts.admin')

@section('title', __('admin.settings'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-navy">{{ __('admin.settings') }}</h2>
            <p class="text-xs text-gray-500 mt-1">
                {{ $locale === 'en' ? 'Manage core company details, phone numbers, and address displayed on the public website.' : '웹사이트 전반(상단/하단/문의페이지)에 노출되는 대표번호, 사업장 주소, 회사명을 설정합니다.' }}
            </p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <!-- Company Name -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Company Name (Korean)' : '회사명 (한국어)' }}
                </label>
                <input type="text" name="settings[company_name_ko]"
                       value="{{ $settings->get('company_name_ko')->value ?? '우성레미콘(주)' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Company Name (English)' : '회사명 (영어)' }}
                </label>
                <input type="text" name="settings[company_name_en]"
                       value="{{ $settings->get('company_name_en')->value ?? 'Woosung Remicon Co., Ltd.' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Phones -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Main Telephone' : '대표 전화번호' }}
                </label>
                <input type="text" name="settings[phone]"
                       value="{{ $settings->get('phone')->value ?? '033-644-5677' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Direct Plant / Dispatch Telephone' : '공장/출하 직통 전화번호' }}
                </label>
                <input type="text" name="settings[phone_alt]"
                       value="{{ $settings->get('phone_alt')->value ?? '033-644-5515' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Email & Founded Year -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Official Email' : '공식 이메일' }}
                </label>
                <input type="email" name="settings[email]"
                       value="{{ $settings->get('email')->value ?? 'info@woosung-remicon.kr' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Establishment Year' : '설립 연도' }}
                </label>
                <input type="text" name="settings[founded_year]"
                       value="{{ $settings->get('founded_year')->value ?? '1999' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Address KO & EN -->
        <div class="space-y-4 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Address (Korean)' : '사업장 주소 (한국어)' }}
                </label>
                <input type="text" name="settings[address_ko]"
                       value="{{ $settings->get('address_ko')->value ?? '강원특별자치도 강릉시 강동면 오이동길 104' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Address (English)' : '사업장 주소 (영어)' }}
                </label>
                <input type="text" name="settings[address_en]"
                       value="{{ $settings->get('address_en')->value ?? '104 Oidong-gil, Gangdong-myeon, Gangneung-si, Gangwon State' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Operating Hours -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Operating Hours (Korean)' : '운영 시간 안내 (한국어)' }}
                </label>
                <input type="text" name="settings[business_hours_ko]"
                       value="{{ $settings->get('business_hours_ko')->value ?? '평일 08:00 ~ 18:00 (토/일/공휴일 사전 협의 타설)' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Operating Hours (English)' : '운영 시간 안내 (영어)' }}
                </label>
                <input type="text" name="settings[business_hours_en]"
                       value="{{ $settings->get('business_hours_en')->value ?? 'Weekdays 08:00 - 18:00 (Weekend pours by arrangement)' }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <div class="flex justify-end pt-6 border-t border-gray-100">
            <button type="submit" class="px-8 py-3 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-md">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
