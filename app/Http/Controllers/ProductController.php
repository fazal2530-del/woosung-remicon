<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $seo = SeoSetting::forPage('products');
        $settings = SiteSetting::getAllSettings();

        $category = $request->get('category', 'all');

        $query = Product::available()->ordered();

        if ($category !== 'all') {
            $query->byCategory($category);
        }

        $products = $query->get();

        $categories = [
            'all'            => ['ko' => '전체 제품', 'en' => 'All Products'],
            'retaining_wall' => ['ko' => '보강토 옹벽블록', 'en' => 'Retaining Wall'],
            'paving'         => ['ko' => '보도·경관블록', 'en' => 'Paving & Landscape'],
            'revetment'      => ['ko' => '호안·환경식생블록', 'en' => 'Revetment & Eco'],
            'remicon'        => ['ko' => '레미콘', 'en' => 'Ready-Mixed Concrete'],
        ];

        return view('products.index', compact('seo', 'settings', 'products', 'category', 'categories'));
    }

    public function show(Product $product): View
    {
        $seo = SeoSetting::forPage('products');
        $settings = SiteSetting::getAllSettings();

        $relatedProducts = Product::available()
            ->where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->ordered()
            ->limit(3)
            ->get();

        return view('products.show', compact('seo', 'settings', 'product', 'relatedProducts'));
    }
}
