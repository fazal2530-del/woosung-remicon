@extends('layouts.app')

@section('content')
@php $locale = app()->getLocale(); @endphp

<!-- Page Hero -->
<section class="relative bg-navy py-20 text-center overflow-hidden"
         style="background-image: linear-gradient(rgba(15,30,54,0.92), rgba(15,30,54,0.92)), url('{{ asset('images/drone-plant-overview.png') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 relative z-10 max-w-3xl">
        <span class="inline-block px-3 py-1 bg-blue/20 text-blue-light border border-blue-light/40 text-xs font-bold tracking-widest rounded-full uppercase mb-3 backdrop-blur-sm">
            ABOUT WOOSUNG REMICON
        </span>
        <h1 class="text-4xl md:text-5xl font-black text-white mb-4">
            {{ $locale === 'en' ? 'About Woosung Remicon' : '회사 소개' }}
        </h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
            {{ $locale === 'en'
                ? 'Building Gangwon\'s future with premium-grade ready-mix concrete and concrete blocks since 1999.'
                : '1999년부터 강원도의 미래를 고품질 콘크리트 및 블록 제품으로 함께 만들어 왔습니다.' }}
        </p>
    </div>
</section>

<!-- Overview (White background + Navy typography) -->
<section class="py-16 bg-white container mx-auto px-4 max-w-6xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                {{ $locale === 'en' ? 'Company Profile' : '기업 개요' }}
            </span>
            <h2 class="text-2xl font-black text-navy mb-6">
                {{ $locale === 'en' ? 'Company Overview' : '회사 개요' }}
            </h2>
            <table class="w-full text-sm border-collapse">
                @php
                $rows = [
                    ['label_ko' => '회사명', 'label_en' => 'Company', 'val_ko' => '우성레미콘(주)', 'val_en' => 'Woosung Remicon Co., Ltd.'],
                    ['label_ko' => '설립연도', 'label_en' => 'Founded', 'val_ko' => '1999년 (업력 25년)', 'val_en' => '1999 (25-year history)'],
                    ['label_ko' => '사업장 주소', 'label_en' => 'Address', 'val_ko' => '강원특별자치도 강릉시 강동면 오이동길 104 (산성우리 106-1)', 'val_en' => '104 Oidong-gil, Gangdong-myeon, Gangneung-si, Gangwon State'],
                    ['label_ko' => '대표전화', 'label_en' => 'Phone', 'val_ko' => '033-644-5677', 'val_en' => '033-644-5677'],
                    ['label_ko' => '공장/직통', 'label_en' => 'Direct Phone', 'val_ko' => '033-644-5515', 'val_en' => '033-644-5515'],
                    ['label_ko' => '이메일', 'label_en' => 'Email', 'val_ko' => 'info@woosung-remicon.kr', 'val_en' => 'info@woosung-remicon.kr'],
                    ['label_ko' => '사업분야', 'label_en' => 'Business', 'val_ko' => '레미콘 제조, 보강토 옹벽블록, 보도·경관블록, 호안·환경식생블록, 아스콘', 'val_en' => 'Ready-Mix Concrete, Retaining Wall Blocks, Paving Blocks, Revetment Blocks, Ascon'],
                ];
                @endphp
                @foreach($rows as $row)
                <tr class="border-b border-slate-100">
                    <td class="py-3.5 pr-4 font-semibold text-slate-500 w-28">
                        {{ $locale === 'en' ? $row['label_en'] : $row['label_ko'] }}
                    </td>
                    <td class="py-3.5 text-navy font-semibold">
                        {{ $locale === 'en' ? $row['val_en'] : $row['val_ko'] }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="space-y-4">
            <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200 bg-white group">
                <div class="relative h-72 overflow-hidden bg-slate-100">
                    <img src="{{ asset('images/company-headquarters.png') }}" alt="우성레미콘(주) 본사 사옥 및 관리동 전경" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute bottom-3 left-3 bg-navy/90 backdrop-blur-sm text-blue-light text-xs font-semibold px-3 py-1.5 rounded-lg shadow-sm">
                        🏢 {{ $locale === 'en' ? 'Woosung Remicon Headquarters & Plant Office' : '우성레미콘(주) 본사 사옥 및 공장 관리동' }}
                    </div>
                </div>
                <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-600">
                    <span class="font-semibold text-navy">{{ $locale === 'en' ? 'Gangwon State Gangneung Plant' : '강원특별자치도 강릉 공장 소재' }}</span>
                    <span class="text-blue font-bold">1999 ~ 2026 (25+ Years)</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 text-center">
                <div class="bg-sky-soft rounded-xl p-3.5 border border-sky-border">
                    <div class="text-blue font-black text-lg">KS F 4009</div>
                    <div class="text-xs text-slate-600 font-semibold mt-0.5">{{ $locale === 'en' ? 'Ready-Mix Standard' : '레디믹스트 콘크리트 인증' }}</div>
                </div>
                <div class="bg-sky-soft rounded-xl p-3.5 border border-sky-border">
                    <div class="text-blue font-black text-lg">KS F 4004</div>
                    <div class="text-xs text-slate-600 font-semibold mt-0.5">{{ $locale === 'en' ? 'Block Standard' : '콘크리트 벽돌 및 블록 인증' }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facility Photo Gallery (Actual photos provided by company) -->
<section class="py-16 bg-surface border-y border-slate-200">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
            <span class="text-blue text-xs font-bold tracking-widest uppercase bg-sky-soft px-3 py-1 rounded-full border border-sky-border inline-block mb-2">
                {{ $locale === 'en' ? 'Our Facilities' : '생산 현장 및 시설' }}
            </span>
            <h2 class="text-3xl font-black text-navy mt-1">
                {{ $locale === 'en' ? 'Production Site & Fleet' : '우성레미콘 강릉 공장 전경 및 설비' }}
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Photo 1: Drone -->
            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group border border-slate-200 bg-white">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="{{ asset('images/drone-plant-overview.png') }}" alt="우성레미콘 공장 전경 드론 사진" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-4 bg-white">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Aerial Drone View' : '사업장 전경 항공 촬영' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'Gangdong-myeon, Gangneung facility' : '강릉시 강동면 오이동길 104' }}</p>
                </div>
            </div>

            <!-- Photo 2: Machine -->
            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group border border-slate-200 bg-white">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="{{ asset('images/automated-block-press.png') }}" alt="콘크리트 블록 제조 설비 라인" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-4 bg-white">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Hydraulic Block Press' : '전자동 블록 성형 설비' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'High-density vibro-compaction' : '고압 진동 유압 자동 성형' }}</p>
                </div>
            </div>

            <!-- Photo 3: Block Yard -->
            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group border border-slate-200 bg-white">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="{{ asset('images/block-curing-yard.png') }}" alt="콘크리트 블록 양생 및 출하 야드" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-4 bg-white">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Curing & Dispatch Yard' : '양생 및 출하 야적장' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'Cured block pallet dispatch' : '충분한 증기 양생 후 출하' }}</p>
                </div>
            </div>

            <!-- Photo 4: Aggregate Bins -->
            <div class="rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group border border-slate-200 bg-white">
                <div class="h-48 overflow-hidden bg-slate-100">
                    <img src="{{ asset('images/aggregate-grading-bins.png') }}" alt="KS 규격 입도별 골재 분리 저장 사일로" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-4 bg-white">
                    <h4 class="font-bold text-navy text-sm">{{ $locale === 'en' ? 'Graded Aggregate Storage' : '규격 골재 분리 사일로' }}</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ $locale === 'en' ? 'Strict size sorting (25·20·13·4mm)' : '입도별 엄격 선별 (25·20·13·4mm)' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values (White background) -->
<section class="bg-white py-16">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-2xl font-black text-navy text-center mb-12">
            {{ $locale === 'en' ? 'Our Core Values' : '경영 이념' }}
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($values as $val)
            <div class="bg-surface rounded-2xl p-6 shadow-sm text-center border-t-4 border-blue border-x border-b border-slate-200">
                <h3 class="font-black text-navy text-lg mb-3">
                    {{ $locale === 'en' ? $val['title_en'] : $val['title_ko'] }}
                </h3>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $locale === 'en' ? $val['desc_en'] : $val['desc_ko'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Company History -->
<section class="py-16 bg-surface border-t border-slate-200">
    <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-2xl font-black text-navy text-center mb-12">
            {{ $locale === 'en' ? 'Company History' : '우성레미콘 주요 연혁' }}
        </h2>
        <div class="space-y-4">
            @foreach($milestones as $m)
            <div class="flex items-start space-x-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <div class="w-20 text-right font-black text-blue text-lg flex-shrink-0 pt-0.5">
                    {{ $m['year'] }}
                </div>
                <div class="w-3.5 h-3.5 rounded-full bg-blue border-2 border-white ring-2 ring-sky-border mt-2 flex-shrink-0"></div>
                <div class="flex-1">
                    <h4 class="font-bold text-navy text-base">
                        {{ $locale === 'en' ? $m['en'] : $m['ko'] }}
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection