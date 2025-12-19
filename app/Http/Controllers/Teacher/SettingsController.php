<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        $settings = SystemSetting::query()->first();

        return view('teacher.pages.settings', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'school_name' => ['nullable', 'string', 'max:255'],
            'school_tagline' => ['nullable', 'string', 'max:255'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'academic_year' => ['nullable', 'string', 'max:50'],
            'term_label' => ['nullable', 'string', 'max:50'],
            'logo_url' => ['nullable', 'url', 'max:255'],
            'footer_note' => ['nullable', 'string', 'max:255'],
        ]);

        $settings = SystemSetting::query()->first();
        if (!$settings) {
            $settings = new SystemSetting();
        }

        $settings->fill($validated);
        $settings->save();

        return back()->with('status', 'System settings updated.');
    }
}
