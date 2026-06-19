<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Show the about us edit form.
     */
    public function edit()
    {
        $aboutUs = AboutUs::first();

        return view('admin.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the about us in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'text' => 'required',
        ]);

        $aboutUs = AboutUs::firstOrNew([]);

        $aboutUs->title = $request->title;
        $aboutUs->text = $request->text;

        $aboutUs->save();

        return redirect()
            ->route('admin.about-us.edit')
            ->with('success', 'About Us Updated Successfully');
    }
}
