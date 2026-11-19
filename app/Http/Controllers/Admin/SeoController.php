<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeoController extends Controller
{
    protected array $pages = ['home', 'about', 'products', 'quality', 'contact'];

    public function index(): View
    {
        $seoSettings = SeoSetting::whereIn('page', $this->pages)->get()->keyBy('page');
        return view('admin.seo.index', compact('seoSettings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'seo.*.page'                 => 'required|string',
            'seo.*.meta_title_ko'        => 'nullable|string|max:300',
            'seo.*.meta_title_en'        => 'nullable|string|max:300',
            'seo.*.meta_description_ko'  => 'nullable|string|max:500',
            'seo.*.meta_description_en'  => 'nullable|string|max:500',
            'seo.*.og_image'             => 'nullable|string|max:500',
        ]);

        foreach ($data['seo'] as $seo) {
            SeoSetting::updateOrCreate(
                ['page' => $seo['page']],
                $seo
            );
        }

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO 설정이 저장되었습니다.');
    }
}
