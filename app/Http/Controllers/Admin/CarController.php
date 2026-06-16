<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('brand', 'like', '%' . $request->search . '%')
                ->orWhere('color', 'like', '%' . $request->search . '%');
        }

        $cars = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.cars.index',
            compact('cars')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'details' => 'required',
            'color' => 'nullable|max:100',
            'brand' => 'nullable|max:100',
            'size' => 'nullable|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request
                ->file('image')
                ->store('cars', 'public');
        }

        Car::create([
            'name' => $request->name,
            'details' => $request->details,
            'color' => $request->color,
            'brand' => $request->brand,
            'size' => $request->size,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view(
            'admin.cars.show',
            compact('car')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view(
            'admin.cars.edit',
            compact('car')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|max:255',
            'details' => 'required',
            'color' => 'nullable|max:100',
            'brand' => 'nullable|max:100',
            'size' => 'nullable|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $car->image = $request
                ->file('image')
                ->store('cars', 'public');
        }

        $car->name = $request->name;
        $car->details = $request->details;
        $car->color = $request->color;
        $car->brand = $request->brand;
        $car->size = $request->size;
        $car->price = $request->price;

        $car->save();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Deleted Successfully');
    }
}