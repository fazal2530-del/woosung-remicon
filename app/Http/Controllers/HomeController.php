<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\PageContent;
use App\Models\Product;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $seo = SeoSetting::forPage('home');
        $settings = SiteSetting::getAllSettings();
        $featuredProducts = Product::available()->ordered()->limit(6)->get();
        $latestAnnouncements = Announcement::published()->latest('published_at')->limit(3)->get();

        return view('home', compact('seo', 'settings', 'featuredProducts', 'latestAnnouncements'));
    }
}
