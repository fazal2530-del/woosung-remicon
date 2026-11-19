@extends('layouts.admin')

@section('title', __('admin.add_new') . ' - ' . __('admin.products'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-navy">{{ __('admin.add_new') }} - {{ __('admin.products') }}</h2>
        <a href="{{ route('admin.products.index') }}" class="text-xs text-gray-500 hover:text-navy font-semibold">
            ← {{ __('admin.back') }}
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <!-- Row 1: Names -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_name_ko') }} <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name_ko" required value="{{ old('name_ko') }}"
                       placeholder="예: 뉴영스톤 1 또는 에코안틱"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_name_en') }}
                </label>
                <input type="text" name="name_en" value="{{ old('name_en') }}"
                       placeholder="e.g., New Young Stone 1 or Eco Antique"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Row 2: Category & Grade -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_category') }} <span class="text-red-500">*</span>
                </label>
                <select name="category" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm bg-white">
                    <option value="retaining_wall" {{ old('category') == 'retaining_wall' ? 'selected' : '' }}>🧱 보강토 옹벽블록 (Retaining Wall)</option>
                    <option value="paving" {{ old('category') == 'paving' ? 'selected' : '' }}>🚶 보도·경관블록 (Paving & Landscape)</option>
                    <option value="revetment" {{ old('category') == 'revetment' ? 'selected' : '' }}>🌊 호안·환경식생블록 (Revetment & Eco)</option>
                    <option value="remicon" {{ old('category') == 'remicon' ? 'selected' : '' }}>🚛 레미콘 (Ready-Mixed Concrete)</option>
                    <option value="block" {{ old('category') == 'block' ? 'selected' : '' }}>🏗️ 일반 콘크리트 블록</option>
                    <option value="ascon" {{ old('category') == 'ascon' ? 'selected' : '' }}>🛣️ 아스콘</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_grade') }} (MPa 또는 N/mm²)
                </label>
                <input type="number" step="0.1" name="grade_mpa" value="{{ old('grade_mpa') }}"
                       placeholder="예: 30, 24, 5.0"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>
        </div>

        <!-- Row 3: Block Dimensions & Physical Metrics -->
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 space-y-4">
            <h4 class="text-xs font-bold text-navy uppercase">{{ $locale === 'en' ? 'Block Dimensions & Physical Properties' : '블록 규격 치수 및 물성' }}</h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ __('admin.prod_length') }} (L, mm)</label>
                    <input type="number" name="block_length" value="{{ old('block_length') }}"
                           placeholder="예: 500, 660, 200"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ __('admin.prod_width') }} (W, mm)</label>
                    <input type="number" name="block_width" value="{{ old('block_width') }}"
                           placeholder="예: 420, 270, 100"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ __('admin.prod_height') }} (H, mm)</label>
                    <input type="number" name="block_height" value="{{ old('block_height') }}"
                           placeholder="예: 200, 250, 60"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">단위 중량 (kg/ea)</label>
                    <input type="number" step="0.1" name="weight_kg" value="{{ old('weight_kg') }}"
                           placeholder="예: 57, 66, 250"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">m²당 소요량 (ea/m²)</label>
                    <input type="text" name="coverage_per_m2" value="{{ old('coverage_per_m2') }}"
                           placeholder="예: 10 ea/m², 6 ea/m²"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">조달청 식별번호 (G2B)</label>
                    <input type="text" name="g2b_code" value="{{ old('g2b_code') }}"
                           placeholder="예: 21720427"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
            </div>
        </div>

        <!-- Row 4: Remicon Specifications -->
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h4 class="text-xs font-bold text-navy uppercase mb-3">{{ $locale === 'en' ? 'Ready-Mixed Concrete Specifications' : '레미콘 전용 규격 사양' }}</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ __('admin.prod_slump') }}</label>
                    <input type="text" name="slump" value="{{ old('slump') }}"
                           placeholder="예: 150mm, 80mm"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">{{ __('admin.prod_aggregate') }}</label>
                    <input type="text" name="max_aggregate_size" value="{{ old('max_aggregate_size') }}"
                           placeholder="예: 25mm, 20mm"
                           class="w-full px-3 py-2 rounded border border-gray-300 text-sm">
                </div>
            </div>
        </div>

        <!-- Row 5: Features KO & EN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    주요 특징 (한국어)
                </label>
                <textarea name="features_ko" rows="3"
                          placeholder="예: 전면 스플릿 암석 텍스처, 턱 물림 일체형 결속 구조."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('features_ko') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    Key Features (English)
                </label>
                <textarea name="features_en" rows="3"
                          placeholder="e.g., Split-face rock texture with integral shear-key connection."
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('features_en') }}</textarea>
            </div>
        </div>

        <!-- Row 6: Applications KO & EN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_app_ko') }}
                </label>
                <textarea name="application_ko" rows="3"
                          placeholder="예: 도로 절성토 옹벽, 주택단지 사면 보호"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('application_ko') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_app_en') }}
                </label>
                <textarea name="application_en" rows="3"
                          placeholder="e.g., Highway cut/fill slopes, residential development retaining walls"
                          class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">{{ old('application_en') }}</textarea>
            </div>
        </div>

        <!-- Row 7: Image & Sorting & Status -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_image') }} (경로/파일명)
                </label>
                <input type="text" name="image_path" value="{{ old('image_path', 'images/factory-interior.jpg') }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">
                    {{ __('admin.prod_sort') }}
                </label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue text-sm">
            </div>

            <div class="pt-5">
                <input type="hidden" name="is_available" value="0">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_available" value="1" {{ old('is_available', 1) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue focus:ring-blue">
                    <span class="text-sm font-bold text-gray-700">{{ __('admin.prod_available') }}</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-600 text-sm font-bold hover:bg-gray-50 transition">
                {{ __('admin.cancel') }}
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-navy hover:bg-blue text-white text-sm font-bold transition shadow-sm">
                {{ __('admin.save') }}
            </button>
        </div>
    </form>
</div>
@endsection
