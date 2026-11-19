@extends('layouts.admin')

@section('title', __('admin.inquiries'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-navy">{{ __('admin.inquiries') }}</h2>
    
    <!-- Status Filter Tabs -->
    <div class="flex space-x-2 bg-gray-200 p-1 rounded-lg text-xs font-bold">
        <a href="{{ route('admin.inquiries.index', ['status' => 'all']) }}"
           class="px-3 py-1.5 rounded-md transition {{ ($status ?? 'all') === 'all' ? 'bg-white text-navy shadow-sm' : 'text-gray-600 hover:text-navy' }}">
            {{ $locale === 'en' ? 'All' : '전체' }}
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}"
           class="px-3 py-1.5 rounded-md transition {{ ($status ?? '') === 'new' ? 'bg-white text-blue shadow-sm' : 'text-gray-600 hover:text-navy' }}">
            {{ __('admin.inq_status_new') }}
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'read']) }}"
           class="px-3 py-1.5 rounded-md transition {{ ($status ?? '') === 'read' ? 'bg-white text-blue shadow-sm' : 'text-gray-600 hover:text-navy' }}">
            {{ __('admin.inq_status_read') }}
        </a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'replied']) }}"
           class="px-3 py-1.5 rounded-md transition {{ ($status ?? '') === 'replied' ? 'bg-white text-green-700 shadow-sm' : 'text-gray-600 hover:text-navy' }}">
            {{ __('admin.inq_status_replied') }}
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3.5">{{ __('admin.created_at') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.inq_name') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.inq_company') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.inq_phone') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.inq_product') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.status') }}</th>
                    <th class="px-6 py-3.5 text-right">{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($inquiries as $inquiry)
                    <tr class="hover:bg-gray-50/80 transition {{ $inquiry->isNew() ? 'bg-blue/5' : '' }}">
                        <td class="px-6 py-4 text-xs text-gray-500 font-mono">
                            {{ $inquiry->created_at->format('Y-m-d H:i') }}
                        </td>
                        <td class="px-6 py-4 font-bold text-navy">
                            {{ $inquiry->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $inquiry->company ?: '-' }}
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-mono text-xs">
                            {{ $inquiry->phone }}
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-700">
                            {{ $inquiry->product_type ?: '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($inquiry->status === 'new')
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue/10 text-blue">
                                    ● {{ __('admin.inq_status_new') }}
                                </span>
                            @elseif($inquiry->status === 'read')
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-sky-soft text-blue border border-sky-border">
                                    {{ __('admin.inq_status_read') }}
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                    {{ __('admin.inq_status_replied') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-blue hover:underline text-xs font-semibold">
                                {{ __('admin.view') }}
                            </a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline text-xs font-semibold">
                                    {{ __('admin.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-400 text-sm">
                            {{ __('admin.no_inquiries') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($inquiries->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $inquiries->links() }}
        </div>
    @endif
</div>
@endsection
