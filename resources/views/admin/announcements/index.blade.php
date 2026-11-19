@extends('layouts.admin')

@section('title', __('admin.announcements'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-navy">{{ __('admin.announcements') }}</h2>
    <a href="{{ route('admin.announcements.create') }}" class="bg-navy hover:bg-blue text-white text-sm font-bold px-4 py-2.5 rounded-lg transition shadow-sm flex items-center space-x-1">
        <span>+</span>
        <span>{{ __('admin.add_new') }}</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3.5">{{ __('admin.created_at') }}</th>
                    <th class="px-6 py-3.5">{{ $locale === 'en' ? 'Title (Korean)' : '제목 (한국어)' }}</th>
                    <th class="px-6 py-3.5">{{ $locale === 'en' ? 'Title (English)' : '제목 (영어)' }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.status') }}</th>
                    <th class="px-6 py-3.5 text-right">{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($announcements as $item)
                    <tr class="hover:bg-gray-50/80 transition">
                        <td class="px-6 py-4 text-xs text-gray-500 font-mono">
                            {{ $item->published_at ? $item->published_at->format('Y-m-d') : $item->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 font-bold text-navy">
                            {{ $item->title_ko }}
                        </td>
                        <td class="px-6 py-4 text-gray-600 text-xs">
                            {{ $item->title_en ?: '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($item->is_published)
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                    {{ $locale === 'en' ? 'Published' : '게시중' }}
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-500">
                                    {{ $locale === 'en' ? 'Draft' : '임시저장' }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.announcements.edit', $item) }}" class="text-blue hover:underline text-xs font-semibold">
                                {{ __('admin.edit') }}
                            </a>
                            <form action="{{ route('admin.announcements.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
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
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">
                            {{ $locale === 'en' ? 'No announcements posted yet.' : '등록된 공지사항이 없습니다.' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($announcements->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $announcements->links() }}
        </div>
    @endif
</div>
@endsection
