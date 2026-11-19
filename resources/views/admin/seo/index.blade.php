@extends('layouts.admin')

@section('title', __('admin.seo'))

@section('content')
@php
    $locale = app()->getLocale();
    $pages = ['home' => '홈', 'about' => '회사소개', 'products' => '제품안내', 'quality' => '품질관리', 'contact' => '오시는 길'];
@endphp

<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-navy">{{ __('admin.seo') }}</h2>
            <p class="text-xs text-gray-500 mt-1">
                {{ $locale === 'en' ? 'Manage meta titles and descriptions for Naver & Google search engines.' : '네이버 및 구글 검색 엔진 최적화(SEO)를 위한 각 페이지별 메타 태그를 설정합니다.' }}
            </p>
        </div>
    </div>

    <form action="{{ route('admin.seo.update') }}" method="POST" class="space-y-8">
        @csrf

        @foreach($pages as $pageKey => $pageLabel)
            @php
                $item = $seoSettings->get($pageKey);
            @endphp
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-navy">
                        🔍 {{ $pageLabel }} ({{ strtoupper($pageKey) }})
                    </h3>
                    <input type="hidden" name="seo[{{ $loop->index }}][page]" value="{{ $pageKey }}">
                </div>

                <div class="p-6 space-y-4">
                    <!-- Title KO & EN -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">
                                메타 타이틀 (KO)
                            </label>
                            <input type="text" name="seo[{{ $loop->index }}][meta_title_ko]"
                                   value="{{ old("seo.{$loop->index}.meta_title_ko", $item->meta_title_ko ?? '') }}"
                                   class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">
                                Meta Title (EN)
                            </label>
                            <input type="text" name="seo[{{ $loop->index }}][meta_title_en]"
                                   value="{{ old("seo.{$loop->index}.meta_title_en", $item->meta_title_en ?? '') }}"
                                   class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm">
                        </div>
                    </div>

                    <!-- Description KO & EN -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">
                                메타 설명 (KO)
                            </label>
                            <textarea name="seo[{{ $loop->index }}][meta_description_ko]" rows="2"
                                      class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm">{{ old("seo.{$loop->index}.meta_description_ko", $item->meta_description_ko ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">
                                Meta Description (EN)
                            </label>
                            <textarea name="seo[{{ $loop->index }}][meta_description_en]" rows="2"
                                      class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm">{{ old("seo.{$loop->index}.meta_description_en", $item->meta_description_en ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="flex justify-end pt-4">
            <button type="submit" class="px-8 py-3 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-md">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
