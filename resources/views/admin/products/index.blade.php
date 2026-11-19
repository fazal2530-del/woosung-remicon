@extends('layouts.admin')

@section('title', __('admin.products'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-navy">{{ __('admin.products') }}</h2>
    <a href="{{ route('admin.products.create') }}" class="bg-navy hover:bg-blue text-white text-sm font-bold px-4 py-2.5 rounded-lg transition shadow-sm flex items-center space-x-1">
        <span>+</span>
        <span>{{ __('admin.add_new') }}</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3.5">{{ __('admin.prod_sort') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.prod_category') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.prod_name_ko') }}</th>
                    <th class="px-6 py-3.5">{{ $locale === 'en' ? 'Specifications' : '핵심 규격' }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.status') }}</th>
                    <th class="px-6 py-3.5 text-right">{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50/80 transition">
                        <td class="px-6 py-4 text-xs text-gray-400 font-mono">{{ $product->sort_order }}</td>
                        <td class="px-6 py-4">
                            @if($product->category === 'remicon')
                                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-blue/10 text-blue">
                                    {{ __('admin.cat_remicon') }}
                                </span>
                            @elseif($product->category === 'block' || in_array($product->category, ['retaining_wall', 'paving', 'revetment']))
                                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-sky-soft text-blue border border-sky-border">
                                    {{ $product->category_label }}
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded text-xs font-bold bg-gray-100 text-gray-700">
                                    {{ __('admin.cat_ascon') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="" class="w-10 h-10 object-cover rounded-lg border border-slate-200 flex-shrink-0">
                                @else
                                    <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center text-sm flex-shrink-0">📦</div>
                                @endif
                                <div>
                                    <div class="font-bold text-navy">{{ $product->name_ko }}</div>
                                    @if($product->name_en)
                                        <div class="text-xs text-gray-400">{{ $product->name_en }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-600">
                            @if($product->grade_mpa)
                                <span class="font-semibold text-navy">{{ $product->grade_mpa }} MPa</span>
                            @endif
                            @if($product->slump)
                                <span class="text-gray-400">|</span> 슬럼프 {{ $product->slump }}mm
                            @endif
                            @if($product->block_width)
                                {{ $product->block_width }}×{{ $product->block_height }}×{{ $product->block_length }}mm
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($product->is_available)
                                <span class="inline-flex items-center text-xs text-green-700 font-bold bg-green-50 px-2 py-0.5 rounded-full">
                                    ● {{ $locale === 'en' ? 'Available' : '공급중' }}
                                </span>
                            @else
                                <span class="inline-flex items-center text-xs text-gray-400 font-bold bg-gray-100 px-2 py-0.5 rounded-full">
                                    ○ {{ $locale === 'en' ? 'Unavailable' : '품절/상담' }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue hover:underline text-xs font-semibold">
                                {{ __('admin.edit') }}
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
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
                        <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm">
                            {{ $locale === 'en' ? 'No products registered yet.' : '등록된 제품이 없습니다.' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
