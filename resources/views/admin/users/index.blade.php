@extends('layouts.admin')

@section('title', __('admin.users'))

@section('content')
@php
    $locale = app()->getLocale();
@endphp

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-navy">{{ __('admin.users') }}</h2>
    <a href="{{ route('admin.users.create') }}" class="bg-navy hover:bg-blue text-white text-sm font-bold px-4 py-2.5 rounded-lg transition shadow-sm flex items-center space-x-1">
        <span>+</span>
        <span>{{ __('admin.add_new') }}</span>
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase border-b border-gray-100">
                <tr>
                    <th class="px-6 py-3.5">{{ __('admin.inq_name') }}</th>
                    <th class="px-6 py-3.5">{{ __('admin.inq_email') }}</th>
                    <th class="px-6 py-3.5">{{ $locale === 'en' ? 'Role' : '권한 역할' }}</th>
                    <th class="px-6 py-3.5">{{ $locale === 'en' ? 'Default Language' : '기본 언어' }}</th>
                    <th class="px-6 py-3.5 text-right">{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50/80 transition">
                        <td class="px-6 py-4 font-bold text-navy">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-600 text-xs font-mono">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            @if($user->role === 'super_admin')
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-navy text-blue-light border border-slate-700">
                                    ★ 최고 관리자 (Super Admin)
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue/10 text-blue">
                                    편집자 (Editor)
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold uppercase text-gray-500">
                            {{ $user->locale ?? 'ko' }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue hover:underline text-xs font-semibold">
                                {{ __('admin.edit') }}
                            </a>
                            @if(auth()->id() !== $user->id)
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('{{ __('admin.confirm_delete') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-xs font-semibold">
                                        {{ __('admin.delete') }}
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400 text-sm">
                            {{ $locale === 'en' ? 'No users found.' : '등록된 관리자가 없습니다.' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
