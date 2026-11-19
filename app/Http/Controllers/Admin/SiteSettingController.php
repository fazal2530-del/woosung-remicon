<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::orderBy('key')->get()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $items = $request->input('settings', []);

        foreach ($items as $key => $value) {
            SiteSetting::setValue($key, $value ?? '');
        }

        return redirect()->route('admin.settings.index')
            ->with('success', '사이트 설정이 저장되었습니다.');
    }
}
