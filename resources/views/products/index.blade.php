@extends('layouts.app')

@section('content')
@php $locale = app()->getLocale(); @endphp

<!-- Page Hero -->
<section class="relative bg-navy py-16 sm:py-20 text-center overflow-hidden"
         style="background-image: linear-gradient(rgba(15,30,54,0.92), rgba(15,30,54,0.85)), url('{{ asset('images/hero-plant-truck.png') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 relative z-10 max-w-3xl">
        <span class="inline-block px-3 py-1 bg-blue/20 text-blue-light border border-blue-light/40 text-xs font-bold tracking-widest rounded-full uppercase mb-3 backdrop-blur-sm">
            {{ $locale === 'en' ? 'OUR PRODUCTS' : '우성레미콘 생산 제품군' }}
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white mb-4">
            {{ $locale === 'en' ? 'Concrete Products & Remicon' : '레미콘 및 콘크리트 블록' }}
        </h1>
        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
            {{ $locale === 'en'
                ? 'Comprehensive catalog of structural retaining wall blocks, landscape interlocking pavers, ecological revetment units, and ready-mixed concrete.'
                : '보강토 옹벽블록, 보도·차도용 인터로킹 페이버, 친환경 하천 식생 호안블록 및 KS 인증 고품질 레미콘 전 제품을 공급합니다.' }}
        </p>
    </div>
</section>

<!-- Category Filter Sticky Bar (Pure White) -->
<section class="bg-white shadow-sm border-b border-slate-200 sticky top-20 z-40">
    <div class="container mx-auto px-4 flex items-center space-x-2 py-3.5 overflow-x-auto scrollbar-none">
        @foreach($categories as $key => $cat)
        <a href="{{ route('products.index', ['category' => $key]) }}"
           class="whitespace-nowrap px-4 py-2 rounded-full text-xs sm:text-sm font-bold transition flex items-center space-x-1.5
                  {{ $category === $key ? 'bg-blue text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
            <span>
                @if($key === 'all') 📦
                @elseif($key === 'retaining_wall') 🏛️
                @elseif($key === 'paving') 🧱
                @elseif($key === 'revetment') 🌿
                @else 🏗️
                @endif
            </span>
            <span>{{ $locale === 'en' ? $cat['en'] : $cat['ko'] }}</span>
        </a>
        @endforeach
    </div>
</section>

<!-- Products Grid (Clean Light Surface) -->
<section class="py-12 sm:py-16 bg-surface container mx-auto px-4 max-w-6xl">
    @if($products->isEmpty())
        <div class="text-center py-24 bg-white rounded-2xl shadow-sm border border-slate-200">
            <div class="text-4xl mb-3">📦</div>
            <p class="text-slate-500 font-medium">{{ $locale === 'en' ? 'No products found in this category.' : '해당 카테고리에 등록된 제품이 없습니다.' }}</p>
            <a href="{{ route('products.index') }}" class="btn-primary mt-4 text-xs">
                {{ $locale === 'en' ? 'View All Products' : '전체 제품 보기' }}
            </a>
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-slate-200 flex flex-col group">
            
            <!-- Visual Header with Real Product Photo -->
            <div class="h-56 bg-slate-100 overflow-hidden relative">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-navy via-[#142a48] to-blue flex items-center justify-center text-white">
                        <span class="text-5xl">🏗️</span>
                    </div>
                @endif
                <div class="absolute top-3 left-3 bg-navy/85 backdrop-blur-sm text-blue-light text-[11px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">
                    {{ $product->category_label }}
                </div>
                @if($product->dimensions)
                    <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm text-white font-mono text-[10px] px-2 py-0.5 rounded">
                        {{ $product->dimensions }}
                    </div>
                @elseif($product->grade_mpa)
                    <div class="absolute bottom-3 right-3 bg-blue/90 backdrop-blur-sm text-white font-bold text-[11px] px-2.5 py-0.5 rounded">
                        {{ (int)$product->grade_mpa }} MPa
                    </div>
                @endif
            </div>

            <!-- Card Details -->
            <div class="p-6 flex-1 flex flex-col justify-between">
                <div>
                    <!-- Category Badge & Stock -->
                    <div class="flex items-center justify-between mb-2">
                        <span class="inline-block text-[11px] font-bold px-2.5 py-0.5 rounded uppercase tracking-wider bg-sky-soft text-blue border border-sky-border">
                            {{ $product->category_label }}
                        </span>
                        @if($product->is_available)
                            <span class="text-[11px] text-emerald-600 font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                {{ $locale === 'en' ? 'In Stock' : '공급 가능' }}
                            </span>
                        @endif
                    </div>

                    <!-- Product Title -->
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue transition">
                        {{ $product->name }}
                    </h3>

                    <!-- Key Technical Metrics -->
                    <div class="space-y-1 bg-surface p-3 rounded-xl text-xs text-slate-600 mb-3 font-mono border border-slate-100">
                        @if($product->dimensions)
                            <div><strong class="text-slate-800">규격:</strong> {{ $product->dimensions }}</div>
                        @endif
                        @if($product->weight_kg)
                            <div><strong class="text-slate-800">중량:</strong> {{ $product->weight_kg }} kg/ea</div>
                        @endif
                        @if($product->coverage_per_m2)
                            <div><strong class="text-slate-800">소요량:</strong> {{ $product->coverage_per_m2 }}</div>
                        @endif
                        @if($product->grade_mpa && $product->category === 'remicon')
                            <div><strong class="text-slate-800">강도:</strong> {{ $product->grade_mpa }} MPa (슬럼프: {{ $product->slump ?? '150mm' }})</div>
                        @endif
                        @if($product->g2b_code)
                            <div class="truncate text-[10px] text-slate-500"><strong class="text-slate-600">조달식별:</strong> {{ $product->g2b_code }}</div>
                        @endif
                    </div>

                    <!-- Application text -->
                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed mb-4">
                        {{ $product->application }}
                    </p>
                </div>

                <!-- Footer buttons -->
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('products.show', $product) }}"
                       class="text-xs font-bold text-blue hover:underline">
                        {{ $locale === 'en' ? 'Detailed Specs →' : '기술 사양 보기 →' }}
                    </a>
                    <a href="{{ route('contact', ['product_id' => $product->id]) }}"
                       class="text-xs font-bold bg-navy hover:bg-blue text-white px-3 py-1.5 rounded-lg transition">
                        {{ $locale === 'en' ? 'Request Quote' : '견적 문의' }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection