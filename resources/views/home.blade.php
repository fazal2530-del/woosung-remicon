@extends('layouts.app')

@section('content')
@php $locale = app()->getLocale(); @endphp

<!-- Hero Section with Real Factory Batch Plant & Truck Background -->
<section class="relative bg-navy min-h-[580px] flex items-center overflow-hidden"
         style="background-image: linear-gradient(to right, rgba(15,30,54,0.92) 0%, rgba(15,30,54,0.80) 55%, rgba(15,30,54,0.50) 100%), url('{{ asset('images/hero-plant-truck.png') }}'); background-size: cover; background-position: center;">
    
    <div class="container mx-auto px-4 py-20 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center space-x-2 bg-blue/20 border border-blue-light/40 rounded-full px-4 py-1.5 mb-6 backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-blue-light animate-pulse"></span>
                <span class="text-blue-light text-xs sm:text-sm font-bold tracking-wide uppercase">
                    {{ $locale === 'en' ? 'Est. 1999 | Gangneung, Gangwon State' : '1999년 창립 | 강원도 강릉 본사 및 공장' }}
                </span>
            </div>
            
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight tracking-tight">
                @if($locale === 'en')
                    <span class="text-blue-light">Engineered Quality</span><br>Ready-Mixed Concrete & Blocks
                @else
                    강원 건설 현장을 위한<br><span class="text-blue-light">고품질 레미콘</span>과 <span class="text-white">콘크리트 블록</span>
                @endif
            </h1>
            
            <p class="text-slate-300 text-base sm:text-lg mb-8 leading-relaxed max-w-2xl">
                {{ $locale === 'en'
                    ? '25 years of trusted manufacturing in Gangdong-myeon, Gangneung. Computerized automated batching and strict KS standard testing ensure consistent strength and on-time jobsite delivery.'
                    : '1999년 설립 이래 25년간 강원도 전역의 건설 인프라와 함께해 왔습니다. 전자동 배칭 플랜트와 엄격한 KS 표준 시험을 거쳐 최고 강도의 레미콘과 블록을 안전하게 납품합니다.' }}
            </p>
            
            <div class="flex flex-wrap items-center gap-4">
                <a href="{{ route('products.index') }}" class="btn-primary text-base">
                    <span>🏗️</span>
                    <span class="ml-2">{{ $locale === 'en' ? 'Explore Products' : '제품 라인업 보기' }}</span>
                </a>
                <a href="{{ route('contact') }}" class="btn-outline text-base">
                    <span>📋</span>
                    <span class="ml-2">{{ $locale === 'en' ? 'Get a Quote' : '견적 및 납품 문의' }}</span>
                </a>
                <a href="tel:033-644-5677" class="inline-flex items-center text-white text-sm font-semibold hover:text-blue-light transition ml-2">
                    <span class="text-blue-light font-black text-lg mr-1.5">033-644-5677</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar (Crisp White + Light Blue Accents) -->
<section class="bg-white py-10 border-b border-slate-200 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x divide-slate-100">
            <div class="px-2">
                <div class="text-3xl sm:text-4xl font-black text-blue">25<span class="text-2xl font-bold">+</span></div>
                <div class="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">{{ $locale === 'en' ? 'Years of Manufacturing' : '년 전통의 업력' }}</div>
            </div>
            <div class="px-2">
                <div class="text-3xl sm:text-4xl font-black text-blue">KS F</div>
                <div class="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">{{ $locale === 'en' ? 'KS Standard Standards' : '한국산업표준 품질 준수' }}</div>
            </div>
            <div class="px-2">
                <div class="text-3xl sm:text-4xl font-black text-blue">210<span class="text-xl font-bold">m³/h</span></div>
                <div class="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">{{ $locale === 'en' ? 'High Output Capacity' : '시간당 연속 출하 능력' }}</div>
            </div>
            <div class="px-2">
                <div class="text-3xl sm:text-4xl font-black text-blue">100<span class="text-2xl font-bold">%</span></div>
                <div class="text-xs sm:text-sm text-slate-600 mt-1 font-semibold">{{ $locale === 'en' ? 'Dedicated Fleet Delivery' : '자사 믹서 트럭 정시 납품' }}</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section (Clean White Background) -->
<section class="py-16 sm:py-20 bg-surface">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                {{ $locale === 'en' ? 'Product Catalog' : '주요 제품 소개' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-navy mt-1">
                {{ $locale === 'en' ? 'Ready-Mixed Concrete & Blocks' : '우성레미콘 대표 생산 품목' }}
            </h2>
            <p class="text-slate-500 text-sm sm:text-base mt-2 max-w-2xl mx-auto">
                {{ $locale === 'en' ? 'Manufactured with high-purity aggregates and computerized mix consistency.' : '고품질 골재와 컴퓨터 자동 계량 시스템으로 균일한 강도를 보증합니다.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
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

                <!-- Card Body -->
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="inline-block text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded bg-sky-soft text-blue border border-sky-border">
                                {{ $product->category_label }}
                            </span>
                            @if($product->is_available)
                                <span class="text-[11px] text-emerald-600 font-semibold flex items-center">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                    {{ $locale === 'en' ? 'Available' : '공급 가능' }}
                                </span>
                            @endif
                        </div>

                        <h3 class="text-xl font-bold text-navy mb-2 group-hover:text-blue transition">
                            {{ $product->name }}
                        </h3>

                        @if($product->grade_mpa || $product->slump)
                            <div class="text-xs text-slate-500 mb-3 space-x-2">
                                @if($product->grade_mpa)<span>강도: <strong class="text-navy">{{ $product->grade_mpa }}MPa</strong></span>@endif
                                @if($product->slump)<span>· 슬럼프: <strong class="text-navy">{{ $product->slump }}</strong></span>@endif
                            </div>
                        @elseif($product->dimensions)
                            <div class="text-xs text-slate-500 mb-3">
                                <span>규격: <strong class="text-navy">{{ $product->dimensions }}</strong></span>
                                @if($product->weight_kg)<span> · <strong class="text-navy">{{ $product->weight_kg }}kg</strong></span>@endif
                            </div>
                        @endif

                        <p class="text-xs text-slate-600 leading-relaxed line-clamp-2 mb-4">
                            {{ $product->application }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('products.show', $product) }}" class="text-xs font-bold text-blue hover:underline">
                            {{ $locale === 'en' ? 'Technical Specs →' : '상세 규격 사양 →' }}
                        </a>
                        <a href="{{ route('contact') }}" class="text-xs font-bold bg-navy hover:bg-blue text-white px-3 py-1.5 rounded-lg transition">
                            {{ $locale === 'en' ? 'Inquire' : '문의' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="btn-primary text-sm">
                <span>{{ $locale === 'en' ? 'View All 26 Products' : '전체 26개 제품 카탈로그 보기' }}</span>
                <span class="ml-2">→</span>
            </a>
        </div>
    </div>
</section>

<!-- Facility Photo Gallery (Pure White Background) -->
<section class="py-16 sm:py-20 bg-white border-t border-slate-200">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                {{ $locale === 'en' ? 'Our Facilities' : '생산 현장 및 시설' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-navy mt-1">
                {{ $locale === 'en' ? 'Gangneung Plant & Equipment' : '우성레미콘 강릉 공장 전경 및 설비' }}
            </h2>
            <p class="text-slate-500 text-sm sm:text-base mt-2 max-w-xl mx-auto">
                {{ $locale === 'en' ? 'Tour our certified production site, heavy batching facility, and transport fleet.' : '강원도 강릉시 강동면 소재 최첨단 배칭 플랜트와 대형 블록 성형 라인입니다.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group border border-slate-200">
                <div class="h-60 overflow-hidden bg-slate-100 relative">
                    <img src="{{ asset('images/drone-plant-overview.png') }}" alt="우성레미콘 강릉 공장 전경 드론 항공 촬영" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute bottom-2.5 left-2.5 bg-navy/90 backdrop-blur-sm text-blue-light text-[11px] font-semibold px-2.5 py-1 rounded">
                        📸 {{ $locale === 'en' ? 'Aerial Drone View' : '사업장 항공 촬영' }}
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-slate-100">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Batching Plant & Solar Facility' : '배칭 플랜트 및 친환경 태양광 설비' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">강원특별자치도 강릉시 강동면 오이동길 104</p>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group border border-slate-200">
                <div class="h-60 overflow-hidden bg-slate-100 relative">
                    <img src="{{ asset('images/automated-block-press.png') }}" alt="콘크리트 블록 자동 유압 설비 라인" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute bottom-2.5 left-2.5 bg-navy/90 backdrop-blur-sm text-blue-light text-[11px] font-semibold px-2.5 py-1 rounded">
                        📸 {{ $locale === 'en' ? 'Automated Block Press' : '전자동 블록 성형기' }}
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-slate-100">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Automated Hydraulic Block Press' : '고압 진동 압축 콘크리트 블록 성형 라인' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'High-density uniform block production' : '정밀 치수 및 고밀도 블록 연속 생산' }}</p>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group border border-slate-200">
                <div class="h-60 overflow-hidden bg-slate-100 relative">
                    <img src="{{ asset('images/block-curing-yard.png') }}" alt="완성 블록 야적 및 출하 야드" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute bottom-2.5 left-2.5 bg-navy/90 backdrop-blur-sm text-blue-light text-[11px] font-semibold px-2.5 py-1 rounded">
                        📸 {{ $locale === 'en' ? 'Curing & Dispatch Yard' : '양생 및 출하 야적장' }}
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-slate-100">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Curing & Loading Yard' : '보도블록 증기 양생 및 출하장' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'Thorough cure strength before jobsite delivery' : '충분한 증기 양생을 통한 설계 강도 발현 후 출하' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us (Light Surface Background) -->
<section class="bg-surface py-16 sm:py-20 border-t border-slate-200">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                {{ $locale === 'en' ? 'Competitive Advantage' : '우성레미콘의 경쟁력' }}
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-navy mt-1">
                {{ $locale === 'en' ? 'Why Woosung Remicon?' : '왜 우성레미콘을 선택하는가?' }}
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $reasons = [
                ['icon' => '🏆', 'ko' => 'KS 품질 표준 준수', 'en' => 'KS Standard Compliance', 'desc_ko' => '한국산업표준 규격에 적합한 표준 배합 설계 적용', 'desc_en' => 'Formulated per Korean Industrial Standards'],
                ['icon' => '🚛', 'ko' => '정시 현장 납품', 'en' => 'On-Time Jobsite Dispatch', 'desc_ko' => '자사 보유 믹서 트럭으로 타설 시간에 오차 없는 배송', 'desc_en' => 'Dedicated fleet ensuring punctual concrete placement'],
                ['icon' => '🔬', 'ko' => '철저한 공장 품질실', 'en' => 'In-House Testing Lab', 'desc_ko' => '슬럼프, 공기량 및 28일 압축강도 파괴 시험 상시 검증', 'desc_en' => 'Continuous break testing, slump and air entrainment testing'],
                ['icon' => '🤝', 'ko' => '25년 신뢰의 파트너', 'en' => '25 Years of Trust', 'desc_ko' => '1999년 창립 이래 강원도 건설 프로젝트 안정적 공급', 'desc_en' => 'Serving eastern Gangwon infrastructure since 1999'],
            ];
            @endphp
            @foreach($reasons as $reason)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:border-blue transition text-left">
                <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-2xl mb-4 border border-sky-border">
                    {{ $reason['icon'] }}
                </div>
                <h3 class="font-bold text-navy text-base mb-2">{{ $locale === 'en' ? $reason['en'] : $reason['ko'] }}</h3>
                <p class="text-xs text-slate-500 leading-relaxed">{{ $locale === 'en' ? $reason['desc_en'] : $reason['desc_ko'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call To Action Banner (Deep Navy with Light Blue buttons) -->
<section class="bg-navy py-16 text-white text-center relative overflow-hidden"
         style="background-image: linear-gradient(rgba(15,30,54,0.92), rgba(15,30,54,0.92)), url('{{ asset('images/factory-yard.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 max-w-3xl relative z-10">
        <h2 class="text-3xl sm:text-4xl font-black mb-4">
            {{ $locale === 'en' ? 'Need a Reliable Concrete Supply Partner?' : '강원도 건설 현장의 확실한 콘크리트 파트너' }}
        </h2>
        <p class="text-slate-300 text-sm sm:text-base mb-8 max-w-xl mx-auto leading-relaxed">
            {{ $locale === 'en'
                ? 'Contact our sales engineering team today for mix designs, volume pricing, and delivery schedules.'
                : '소량 타설부터 대형 인프라 공사까지 현장 맞춤형 배합 설계와 신속한 납품 일정을 약속드립니다.' }}
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="tel:033-644-5677" class="btn-primary text-base">
                <span>📞 대표전화 033-644-5677</span>
            </a>
            <a href="{{ route('contact') }}" class="btn-outline text-base">
                <span>온라인 견적 문의서 작성</span>
            </a>
        </div>
    </div>
</section>
@endsection