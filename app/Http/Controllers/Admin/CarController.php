<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('brand', 'like', '%' . $request->search . '%')
                ->orWhere('color', 'like', '%' . $request->search . '%');
        }

        $cars = $query->latest()->paginate(10)->withQueryString();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

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
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('cars', 'public');

        $car = Car::create([
            'name' => $request->name,
            'details' => $request->details,
            'color' => $request->color,
            'brand' => $request->brand,
            'size' => $request->size,
            'price' => $request->price,
            'image' => $imagePath,
            'status' => $request->boolean('status', true),
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('cars/gallery', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Created Successfully');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

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
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->name = $request->name;
        $car->details = $request->details;
        $car->color = $request->color;
        $car->brand = $request->brand;
        $car->size = $request->size;
        $car->price = $request->price;
        $car->status = $request->boolean('status', true);

        $car->save();

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('cars/gallery', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Updated Successfully');
    }

    public function destroyImage(CarImage $carImage)
    {
        if (Storage::disk('public')->exists($carImage->image)) {
            Storage::disk('public')->delete($carImage->image);
        }

        $carImage->delete();

        return response()->json(['success' => true]);
    }

    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        foreach ($car->images as $img) {
            if (Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
            $img->delete();
        }

        $car->delete();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car Deleted Successfully');
    }
}