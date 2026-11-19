<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageContentController extends Controller
{
    protected array $pages = ['home', 'about', 'products', 'quality', 'contact'];

    public function index(): View
    {
        $pageContents = PageContent::orderBy('page')->orderBy('section')->orderBy('key')->get()->groupBy('page');
        return view('admin.page-content.index', compact('pageContents'));
    }

    public function update(Request $request): RedirectResponse
    {
        $items = $request->input('content', []);

        foreach ($items as $id => $values) {
            PageContent::where('id', $id)->update([
                'value_ko' => $values['value_ko'] ?? '',
                'value_en' => $values['value_en'] ?? '',
            ]);
        }

        // Create new items if provided
        $newItems = $request->input('new', []);
        foreach ($newItems as $item) {
            if (!empty($item['page']) && !empty($item['section']) && !empty($item['key'])) {
                PageContent::updateOrCreate(
                    ['page' => $item['page'], 'section' => $item['section'], 'key' => $item['key']],
                    ['value_ko' => $item['value_ko'] ?? '', 'value_en' => $item['value_en'] ?? '']
                );
            }
        }

        return redirect()->route('admin.page-content.index')
            ->with('success', '페이지 콘텐츠가 저장되었습니다.');
    }
}
