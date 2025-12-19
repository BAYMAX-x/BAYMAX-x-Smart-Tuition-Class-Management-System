<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ZoomLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ZoomLinkController extends Controller
{
    public function index(): View
    {
        $links = ZoomLink::latest()->get();

        return view('teacher.pages.zoom-links', compact('links'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'meeting_url' => ['required', 'url'],
            'passcode' => ['nullable', 'string', 'max:255'],
        ]);

        ZoomLink::create($validated);

        return back()->with('status', 'Zoom link added.');
    }

    public function update(Request $request, ZoomLink $zoom_link): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'meeting_url' => ['required', 'url'],
            'passcode' => ['nullable', 'string', 'max:255'],
        ]);

        $zoom_link->update($validated);

        return back()->with('status', 'Zoom link updated.');
    }

    public function destroy(ZoomLink $zoom_link): RedirectResponse
    {
        $zoom_link->delete();

        return back()->with('status', 'Zoom link removed.');
    }
}
