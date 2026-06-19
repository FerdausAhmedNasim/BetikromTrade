<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Show the social media edit form.
     */
    public function edit()
    {
        $socialMedia = SocialMedia::first();

        return view('admin.social-media.edit', compact('socialMedia'));
    }

    /**
     * Update the social media in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|max:255',
            'youtube' => 'nullable|url|max:255',
        ]);

        $socialMedia = SocialMedia::firstOrNew([]);

        $socialMedia->facebook = $request->facebook;
        $socialMedia->twitter = $request->twitter;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->youtube = $request->youtube;

        $socialMedia->save();

        return redirect()
            ->route('admin.social-media.edit')
            ->with('success', 'Social Media Updated Successfully');
    }
}
