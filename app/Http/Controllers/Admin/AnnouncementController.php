<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function index(): View
    {
        $announcements = Announcement::latest()->paginate(20);
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create(): View
    {
        return view('admin.announcements.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAnnouncement($request);
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }
        Announcement::create($validated);
        return redirect()->route('admin.announcements.index')
            ->with('success', '공지사항이 등록되었습니다.');
    }

    public function show(Announcement $announcement): View
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement): View
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement): RedirectResponse
    {
        $validated = $this->validateAnnouncement($request);
        if ($validated['is_published'] && empty($announcement->published_at)) {
            $validated['published_at'] = now();
        }
        $announcement->update($validated);
        return redirect()->route('admin.announcements.index')
            ->with('success', '공지사항이 수정되었습니다.');
    }

    public function destroy(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')
            ->with('success', '공지사항이 삭제되었습니다.');
    }

    private function validateAnnouncement(Request $request): array
    {
        return $request->validate([
            'title_ko'     => 'required|string|max:300',
            'title_en'     => 'nullable|string|max:300',
            'body_ko'      => 'required|string',
            'body_en'      => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
    }
}
