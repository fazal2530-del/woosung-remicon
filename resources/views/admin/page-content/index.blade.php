@extends('layouts.admin')

@section('title', __('admin.page_content'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-navy">{{ __('admin.page_content') }}</h2>
            <p class="text-xs text-gray-500 mt-1">
                {{ $locale === 'en' ? 'Manage editable text sections across website pages in both Korean and English.' : '웹사이트 각 페이지 섹션별 텍스트를 한국어와 영어로 직접 편집할 수 있습니다.' }}
            </p>
        </div>
    </div>

    <form action="{{ route('admin.page-content.update') }}" method="POST" class="space-y-8">
        @csrf

        @forelse($pageContents as $pageName => $items)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-navy uppercase tracking-wider">
                        📄 {{ strtoupper($pageName) }} {{ $locale === 'en' ? 'Page' : '페이지' }}
                    </h3>
                    <span class="text-xs text-gray-400 font-mono">{{ count($items) }} {{ $locale === 'en' ? 'sections' : '항목' }}</span>
                </div>

                <div class="p-6 divide-y divide-gray-100">
                    @foreach($items as $item)
                        <div class="py-4 first:pt-0 last:pb-0 space-y-3">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-blue font-mono">[{{ $item->section }}] {{ $item->key }}</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">한국어 (KO)</label>
                                    <textarea name="content[{{ $item->id }}][value_ko]" rows="2"
                                              class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ $item->value_ko }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-gray-500 mb-1">English (EN)</label>
                                    <textarea name="content[{{ $item->id }}][value_en]" rows="2"
                                              class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ $item->value_en }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="bg-white p-8 rounded-xl shadow-sm text-center text-gray-400 text-sm">
                {{ $locale === 'en' ? 'No page content entries found.' : '등록된 페이지 콘텐츠가 없습니다.' }}
            </div>
        @endforelse

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-3 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-md">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
