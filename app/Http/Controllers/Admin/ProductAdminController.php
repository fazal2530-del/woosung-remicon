<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductAdminController extends Controller
{
    public function index(): View
    {
        $products = Product::ordered()->paginate(25);
        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        Product::create($validated);
        return redirect()->route('admin.products.index')
            ->with('success', '제품이 등록되었습니다.');
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        $product->update($validated);
        return redirect()->route('admin.products.index')
            ->with('success', '제품이 수정되었습니다.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', '제품이 삭제되었습니다.');
    }

    private function validateProduct(Request $request): array
    {
        return $request->validate([
            'name_ko'            => 'required|string|max:200',
            'name_en'            => 'nullable|string|max:200',
            'category'           => 'required|string|max:50',
            'grade_mpa'          => 'nullable|numeric|min:0|max:200',
            'block_width'        => 'nullable|integer|min:0',
            'block_height'       => 'nullable|integer|min:0',
            'block_length'       => 'nullable|integer|min:0',
            'weight_kg'          => 'nullable|numeric|min:0',
            'coverage_per_m2'    => 'nullable|string|max:50',
            'g2b_code'           => 'nullable|string|max:100',
            'slump'              => 'nullable|string|max:50',
            'max_aggregate_size' => 'nullable|string|max:50',
            'application_ko'     => 'nullable|string|max:2000',
            'application_en'     => 'nullable|string|max:2000',
            'features_ko'        => 'nullable|string|max:2000',
            'features_en'        => 'nullable|string|max:2000',
            'is_available'       => 'boolean',
            'sort_order'         => 'integer|min:0',
            'image_path'         => 'nullable|string|max:500',
        ]);
    }
}
