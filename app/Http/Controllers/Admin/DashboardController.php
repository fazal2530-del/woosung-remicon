<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Inquiry;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'products'           => Product::count(),
            'available_products' => Product::available()->count(),
            'inquiries_new'      => Inquiry::where('status', 'new')->count(),
            'inquiries_total'    => Inquiry::count(),
            'announcements'      => Announcement::count(),
        ];

        $recentInquiries = Inquiry::latest()->limit(5)->get();
        $latestAnnouncements = Announcement::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'latestAnnouncements'));
    }
}
