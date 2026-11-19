@extends('layouts.admin')

@section('title', __('admin.inquiries') . ' - ' . $inquiry->name)

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-navy">{{ __('admin.inquiries') }} #{{ $inquiry->id }}</h2>
        <a href="{{ route('admin.inquiries.index') }}" class="text-xs text-gray-500 hover:text-navy font-semibold">
            ← {{ __('admin.back') }}
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="p-6 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-navy">{{ $inquiry->name }}</h3>
                <p class="text-xs text-gray-500">{{ $inquiry->company ?: '-' }} | {{ $inquiry->created_at->format('Y-m-d H:i:s') }}</p>
            </div>
            <div>
                @if($inquiry->status === 'new')
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue/10 text-blue">
                        {{ __('admin.inq_status_new') }}
                    </span>
                @elseif($inquiry->status === 'read')
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-sky-soft text-blue border border-sky-border">
                        {{ __('admin.inq_status_read') }}
                    </span>
                @else
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                        {{ __('admin.inq_status_replied') }}
                    </span>
                @endif
            </div>
        </div>

        <!-- Details -->
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_phone') }}</label>
                    <a href="tel:{{ $inquiry->phone }}" class="text-sm font-bold text-navy hover:text-blue">
                        {{ $inquiry->phone }}
                    </a>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_email') }}</label>
                    <a href="mailto:{{ $inquiry->email }}" class="text-sm text-gray-700 hover:underline">
                        {{ $inquiry->email ?: '-' }}
                    </a>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_product') }}</label>
                    <p class="text-sm font-semibold text-navy">{{ $inquiry->product_type ?: '-' }}</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_qty') }}</label>
                    <p class="text-sm font-semibold text-navy">{{ $inquiry->quantity ?: '-' }}</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_address') }}</label>
                    <p class="text-sm text-gray-700">{{ $inquiry->delivery_address ?: '-' }}</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase mb-1">{{ __('admin.inq_date') }}</label>
                    <p class="text-sm text-gray-700">{{ $inquiry->preferred_date ? $inquiry->preferred_date->format('Y-m-d') : '-' }}</p>
                </div>
            </div>

            <!-- Message Body -->
            <div class="pt-4 border-t border-gray-100">
                <label class="block text-xs font-bold text-gray-400 uppercase mb-2">{{ __('admin.inq_message') }}</label>
                <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-800 whitespace-pre-wrap leading-relaxed">
                    {{ $inquiry->message }}
                </div>
            </div>

            <!-- Actions footer -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                <div class="flex space-x-2">
                    <a href="tel:{{ $inquiry->phone }}" class="px-4 py-2 bg-navy text-white text-xs font-bold rounded-lg hover:bg-blue transition">
                        📞 {{ $locale === 'en' ? 'Call Contact' : '전화걸기' }}
                    </a>
                </div>

                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-xs font-semibold hover:underline">
                        {{ __('admin.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
