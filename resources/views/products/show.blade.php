@extends('layouts.app')

@section('content')
@php $locale = app()->getLocale(); @endphp

<!-- Breadcrumb (Clean White) -->
<div class="bg-white border-b border-slate-200">
    <div class="container mx-auto px-4 py-3 text-xs text-slate-500 flex items-center space-x-2">
        <a href="{{ route('home') }}" class="hover:text-blue">{{ $locale === 'en' ? 'Home' : '홈' }}</a>
        <span>›</span>
        <a href="{{ route('products.index') }}" class="hover:text-blue">{{ $locale === 'en' ? 'Products' : '제품안내' }}</a>
        <span>›</span>
        <a href="{{ route('products.index', ['category' => $product->category]) }}" class="hover:text-blue">{{ $product->category_label }}</a>
        <span>›</span>
        <span class="text-navy font-bold truncate">{{ $product->name }}</span>
    </div>
</div>

<section class="py-12 sm:py-16 bg-surface container mx-auto px-4 max-w-6xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Left: Product Visual Header with Real Image -->
        <div class="lg:col-span-5">
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-200 sticky top-24">
                <div class="h-80 sm:h-96 bg-slate-100 overflow-hidden relative flex items-center justify-center">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-navy via-[#142a48] to-blue flex items-center justify-center text-white">
                            <span class="text-7xl">🏗️</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 bg-navy/85 backdrop-blur-sm text-blue-light text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider">
                        {{ $product->category_label }}
                    </div>
                    @if($product->dimensions)
                        <div class="absolute bottom-4 left-4 bg-black/70 backdrop-blur-sm text-white font-mono text-xs px-3 py-1 rounded-md">
                            {{ $product->dimensions }}
                        </div>
                    @elseif($product->grade_mpa)
                        <div class="absolute bottom-4 left-4 bg-blue/90 backdrop-blur-sm text-white font-bold text-xs px-3 py-1 rounded-md">
                            {{ (int)$product->grade_mpa }} MPa Design Strength
                        </div>
                    @endif
                </div>
                <div class="p-6 bg-white border-t border-slate-100">
                    <div class="flex items-center justify-between text-xs text-slate-500">
                        <span>인증 품질 표준:</span>
                        <strong class="text-navy font-semibold">{{ $product->category === 'remicon' ? 'KS F 4009' : 'KS F 4004' }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Technical Details & Specifications Table -->
        <div class="lg:col-span-7 space-y-6">
            <div>
                <span class="inline-block text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-3 bg-sky-soft text-blue border border-sky-border">
                    {{ $product->category_label }}
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-navy mb-3">
                    {{ $product->name }}
                </h1>
                @if($product->name_en && $locale !== 'en')
                    <p class="text-sm text-slate-400 font-mono -mt-1 mb-4">{{ $product->name_en }}</p>
                @endif
            </div>

            <!-- Specifications Table (White Surface) -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="bg-slate-50 px-6 py-3.5 border-b border-slate-200">
                    <h3 class="text-sm font-bold text-navy uppercase tracking-wider">
                        📋 {{ $locale === 'en' ? 'Product Specifications' : '제품 기술 사양 및 규격' }}
                    </h3>
                </div>
                <div class="divide-y divide-slate-100 text-sm">
                    @if($product->dimensions)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Dimensions (L×W×H)' : '상세 규격 (L×W×H)' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->dimensions }}</span>
                    </div>
                    @endif

                    @if($product->weight_kg)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Unit Weight' : '개당 중량' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->weight_kg }} kg/ea</span>
                    </div>
                    @endif

                    @if($product->coverage_per_m2)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Coverage / Consumption' : 'm²당 소요량' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->coverage_per_m2 }}</span>
                    </div>
                    @endif

                    @if($product->grade_mpa)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Design Strength / Flexural' : '설계기준강도 / 휨강도' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->grade_mpa }} MPa (N/mm²)</span>
                    </div>
                    @endif

                    @if($product->slump)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Slump' : '슬럼프 (작업성)' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->slump }}</span>
                    </div>
                    @endif

                    @if($product->max_aggregate_size)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Max Aggregate Size' : '굵은 골재 최대치수' }}</span>
                        <span class="col-span-2 text-navy font-bold font-mono">{{ $product->max_aggregate_size }}</span>
                    </div>
                    @endif

                    @if($product->g2b_code)
                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Procurement G2B ID' : '나라장터 물품식별번호' }}</span>
                        <span class="col-span-2 text-blue font-bold font-mono text-xs">{{ $product->g2b_code }}</span>
                    </div>
                    @endif

                    <div class="grid grid-cols-3 px-6 py-3.5">
                        <span class="text-slate-500 font-medium">{{ $locale === 'en' ? 'Production Standard' : '생산 품질 표준' }}</span>
                        <span class="col-span-2 text-navy font-semibold">
                            {{ $product->category === 'remicon' ? 'KS F 4009 레디믹스트 콘크리트' : 'KS F 4004 / 단체표준 및 조달청 품질 기준' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Features -->
            @if($product->features_ko || $product->features_en)
            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-navy text-sm mb-2">
                    💡 {{ $locale === 'en' ? 'Key Technical Features' : '핵심 기술 특징' }}
                </h3>
                <p class="text-sm text-slate-700 leading-relaxed">
                    {{ $product->features }}
                </p>
            </div>
            @endif

            <!-- Application -->
            @if($product->application_ko || $product->application_en)
            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-navy text-sm mb-2">
                    🎯 {{ $locale === 'en' ? 'Recommended Applications' : '주요 적용 현장 및 용도' }}
                </h3>
                <p class="text-sm text-slate-700 leading-relaxed">
                    {{ $product->application }}
                </p>
            </div>
            @endif

            <!-- Call to Actions -->
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ route('contact', ['product_id' => $product->id]) }}" class="btn-primary text-sm flex items-center space-x-2">
                    <span>📋</span>
                    <span>{{ $locale === 'en' ? 'Request Quote for This Product' : '이 제품으로 견적 문의하기' }}</span>
                </a>
                <a href="tel:033-644-5677" class="btn-navy text-sm flex items-center space-x-2">
                    <span>📞</span>
                    <span>033-644-5677 전화 상담</span>
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-navy px-4 py-3">
                    ← {{ $locale === 'en' ? 'All Products List' : '전체 제품 목록' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection