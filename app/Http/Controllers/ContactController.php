<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $seo = SeoSetting::forPage('contact');
        $settings = SiteSetting::getAllSettings();

        return view('contact', compact('seo', 'settings'));
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'company'          => 'nullable|string|max:200',
            'phone'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:200',
            'product_type'     => 'nullable|string|max:100',
            'quantity'         => 'nullable|string|max:100',
            'delivery_address' => 'nullable|string|max:500',
            'preferred_date'   => 'nullable|date|after_or_equal:today',
            'message'          => 'required|string|max:3000',
        ], [
            'name.required'    => '이름을 입력해 주세요.',
            'phone.required'   => '전화번호를 입력해 주세요.',
            'message.required' => '문의 내용을 입력해 주세요.',
            'email.email'      => '올바른 이메일 주소를 입력해 주세요.',
            'preferred_date.after_or_equal' => '희망 납기일은 오늘 이후 날짜를 선택해 주세요.',
        ]);

        Inquiry::create($validated);

        return redirect()->route('contact')
            ->with('success', '문의가 접수되었습니다. 빠른 시일 내에 연락드리겠습니다.');
    }
}
