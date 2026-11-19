@extends('layouts.admin')

@section('title', __('admin.dashboard'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<!-- Stat Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Products Stat -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">{{ __('admin.stat_products') }}</p>
            <h3 class="text-3xl font-black text-navy mt-1">{{ $stats['products'] }}</h3>
            <p class="text-xs text-green-600 mt-1 font-medium">
                {{ $stats['available_products'] }} {{ $locale === 'en' ? 'active' : '공급 가능' }}
            </p>
        </div>
        <div class="w-12 h-12 bg-blue/10 text-blue rounded-xl flex items-center justify-center text-2xl">
            🏗️
        </div>
    </div>

    <!-- New Inquiries Stat -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">{{ __('admin.stat_inquiries_new') }}</p>
            <h3 class="text-3xl font-black text-blue mt-1">{{ $stats['inquiries_new'] }}</h3>
            <p class="text-xs text-gray-500 mt-1">
                {{ $stats['inquiries_total'] }} {{ $locale === 'en' ? 'total received' : '전체 접수' }}
            </p>
        </div>
        <div class="w-12 h-12 bg-sky-soft text-blue rounded-xl flex items-center justify-center text-2xl border border-sky-border">
            📩
        </div>
    </div>

    <!-- Total Inquiries Stat -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">{{ __('admin.stat_inquiries_all') }}</p>
            <h3 class="text-3xl font-black text-navy mt-1">{{ $stats['inquiries_total'] }}</h3>
            <p class="text-xs text-gray-400 mt-1">{{ $locale === 'en' ? 'Cumulative inquiries' : '누적 문의 수' }}</p>
        </div>
        <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-2xl">
            📋
        </div>
    </div>

    <!-- Announcements Stat -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">{{ __('admin.stat_announcements') }}</p>
            <h3 class="text-3xl font-black text-navy mt-1">{{ $stats['announcements'] }}</h3>
            <p class="text-xs text-blue mt-1">
                <a href="{{ route('admin.announcements.create') }}" class="hover:underline">+ {{ __('admin.add_new') }}</a>
            </p>
        </div>
        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-2xl">
            📢
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Recent Inquiries Table -->
    <div class="lg:col-span-8 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-navy text-base">{{ __('admin.recent_inquiries') }}</h3>
            <a href="{{ route('admin.inquiries.index') }}" class="text-xs text-blue font-semibold hover:underline">
                {{ __('admin.view') }} {{ __('admin.all') ?? '전체보기' }} →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3.5">{{ __('admin.inq_name') }}</th>
                        <th class="px-6 py-3.5">{{ __('admin.inq_company') }}</th>
                        <th class="px-6 py-3.5">{{ __('admin.inq_phone') }}</th>
                        <th class="px-6 py-3.5">{{ __('admin.status') }}</th>
                        <th class="px-6 py-3.5">{{ __('admin.created_at') }}</th>
                        <th class="px-6 py-3.5 text-right">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentInquiries as $inquiry)
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="px-6 py-4 font-bold text-navy">{{ $inquiry->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $inquiry->company ?: '-' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $inquiry->phone }}</td>
                            <td class="px-6 py-4">
                                @if($inquiry->status === 'new')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue/10 text-blue">
                                        {{ __('admin.inq_status_new') }}
                                    </span>
                                @elseif($inquiry->status === 'read')
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-bold bg-sky-soft text-blue border border-sky-border">
                                        {{ __('admin.inq_status_read') }}
                                    </span>
                                @else
                                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                        {{ __('admin.inq_status_replied') }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-400">
                                {{ $inquiry->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-blue hover:underline text-xs font-semibold">
                                    {{ __('admin.view') }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm">
                                {{ __('admin.no_inquiries') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Navigation / System Info -->
    <div class="lg:col-span-4 space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-navy text-base mb-4">{{ $locale === 'en' ? 'Quick Actions' : '빠른 작업' }}</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.products.create') }}"
                   class="flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-blue hover:bg-blue/5 transition">
                    <span class="text-sm font-semibold text-navy">🏗️ {{ $locale === 'en' ? 'Add New Product' : '새 제품 등록' }}</span>
                    <span class="text-blue font-bold">+</span>
                </a>
                <a href="{{ route('admin.announcements.create') }}"
                   class="flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-blue hover:bg-blue/5 transition">
                    <span class="text-sm font-semibold text-navy">📢 {{ $locale === 'en' ? 'Post Announcement' : '공지사항 작성' }}</span>
                    <span class="text-blue font-bold">+</span>
                </a>
                <a href="{{ route('admin.settings.index') }}"
                   class="flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-blue hover:bg-blue/5 transition">
                    <span class="text-sm font-semibold text-navy">⚙️ {{ $locale === 'en' ? 'Edit Phone & Address' : '대표번호·주소 수정' }}</span>
                    <span class="text-gray-400">→</span>
                </a>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-navy text-base mb-3">{{ $locale === 'en' ? 'Company Info' : '기업 기본 정보' }}</h3>
            <ul class="text-xs text-gray-600 space-y-2">
                <li><strong class="text-navy">{{ $locale === 'en' ? 'Company:' : '회사명:' }}</strong> 우성레미콘(주)</li>
                <li><strong class="text-navy">{{ $locale === 'en' ? 'Address:' : '소재지:' }}</strong> 강릉시 강동면 오이동길 104</li>
                <li><strong class="text-navy">{{ $locale === 'en' ? 'Phone:' : '대표전화:' }}</strong> 033-644-5677 / 033-644-5515</li>
                <li><strong class="text-navy">{{ $locale === 'en' ? 'Locale:' : '현재 언어:' }}</strong> {{ strtoupper($locale) }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
