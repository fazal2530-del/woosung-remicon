@extends('layouts.admin')

@section('title', __('admin.add_new') . ' - ' . __('admin.announcements'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-navy">{{ __('admin.add_new') }} - {{ __('admin.announcements') }}</h2>
        <a href="{{ route('admin.announcements.index') }}" class="text-xs text-gray-500 hover:text-navy font-semibold">
            ← {{ __('admin.back') }}
        </a>
    </div>

    <form action="{{ route('admin.announcements.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <!-- Titles -->
        <div class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Notice Title (Korean)' : '공지 제목 (한국어)' }} <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title_ko" required value="{{ old('title_ko') }}"
                       placeholder="예: 2026년 하계 콘크리트 타설 품질 관리 안내"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Notice Title (English)' : '공지 제목 (영어)' }}
                </label>
                <input type="text" name="title_en" value="{{ old('title_en') }}"
                       placeholder="e.g., Summer Season Concrete Pouring Quality Guidelines"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Bodies -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Body (Korean)' : '내용 (한국어)' }} <span class="text-red-500">*</span>
                </label>
                <textarea name="body_ko" rows="8" required
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('body_ko') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Body (English)' : '내용 (영어)' }}
                </label>
                <textarea name="body_en" rows="8"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('body_en') }}</textarea>
            </div>
        </div>

        <!-- Options -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center pt-4 border-t border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ $locale === 'en' ? 'Publication Date' : '게시 일자' }}
                </label>
                <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div class="pt-5">
                <input type="hidden" name="is_published" value="0">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue focus:ring-blue">
                    <span class="text-sm font-bold text-gray-700">{{ $locale === 'en' ? 'Publish immediately' : '즉시 공개 게시' }}</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.announcements.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-bold hover:bg-gray-50 transition">
                {{ __('admin.cancel') }}
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-sm">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
