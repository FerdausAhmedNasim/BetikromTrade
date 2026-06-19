<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Show the settings edit form.
     */
    public function edit()
    {
        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the settings in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting = Setting::firstOrNew([]);

        if ($request->hasFile('logo')) {
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }

            $setting->logo = $request
                ->file('logo')
                ->store('settings', 'public');
        }

        $setting->site_name = $request->site_name;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;

        $setting->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Settings Updated Successfully');
    }
}
