<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Showroom::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('phone', 'like', '%'.$request->search.'%')
                ->orWhere('address', 'like', '%'.$request->search.'%');
        }

        $showrooms = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.showrooms.index', compact('showrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.showrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required',
            'google_map' => 'nullable|max:255',
            'status' => 'nullable|boolean',
        ]);

        Showroom::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name).'-'.uniqid(),
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'google_map' => $request->google_map,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('admin.showrooms.index')
            ->with('success', 'Showroom Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Showroom $showroom)
    {
        return view('admin.showrooms.show', compact('showroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showroom $showroom)
    {
        return view('admin.showrooms.edit', compact('showroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showroom $showroom)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'required',
            'google_map' => 'nullable|max:255',
            'status' => 'nullable|boolean',
        ]);

        $showroom->name = $request->name;
        $showroom->slug = Str::slug($request->name).'-'.uniqid();
        $showroom->phone = $request->phone;
        $showroom->email = $request->email;
        $showroom->address = $request->address;
        $showroom->google_map = $request->google_map;
        $showroom->status = $request->status ?? 0;

        $showroom->save();

        return redirect()
            ->route('admin.showrooms.index')
            ->with('success', 'Showroom Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showroom $showroom)
    {
        $showroom->delete();

        return redirect()
            ->route('admin.showrooms.index')
            ->with('success', 'Showroom Deleted Successfully');
    }
}
