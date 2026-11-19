<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->get('status', 'all');
        $query = Inquiry::latest();

        if ($status !== 'all' && in_array($status, ['new', 'read', 'replied'])) {
            $query->where('status', $status);
        }

        $inquiries = $query->paginate(20);
        return view('admin.inquiries.index', compact('inquiries', 'status'));
    }

    public function show(Inquiry $inquiry): View
    {
        if ($inquiry->isNew()) {
            $inquiry->markAsRead();
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')
            ->with('success', '문의가 삭제되었습니다.');
    }
}
