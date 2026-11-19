@extends('layouts.admin')

@section('title', __('admin.add_new') . ' - ' . __('admin.users'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-navy">{{ __('admin.add_new') }} - {{ __('admin.users') }}</h2>
        <a href="{{ route('admin.users.index') }}" class="text-xs text-gray-500 hover:text-navy font-semibold">
            ← {{ __('admin.back') }}
        </a>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                {{ $locale === 'en' ? 'User Name' : '관리자 이름' }} <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" required value="{{ old('name') }}"
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                {{ $locale === 'en' ? 'Email Address' : '이메일 주소 (로그인 ID)' }} <span class="text-red-500">*</span>
            </label>
            <input type="email" name="email" required value="{{ old('email') }}"
                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Password' : '비밀번호' }} <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Confirm Password' : '비밀번호 확인' }} <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password_confirmation" required
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Role' : '권한 역할' }} <span class="text-red-500">*</span>
                </label>
                <select name="role" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm bg-white">
                    <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>최고 관리자 (Super Admin)</option>
                    <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>일반 관리자 / 편집자 (Editor)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Default Language' : '기본 사용 언어' }} <span class="text-red-500">*</span>
                </label>
                <select name="locale" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm bg-white">
                    <option value="ko" {{ old('locale') == 'ko' ? 'selected' : '' }}>한국어 (Korean)</option>
                    <option value="en" {{ old('locale') == 'en' ? 'selected' : '' }}>English (영어)</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-bold hover:bg-gray-50 transition">
                {{ __('admin.cancel') }}
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-sm">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
