<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Car;
use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\Showroom;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $banners = Banner::where('status', 1)->latest()->get();

        $cars = Car::latest()
            ->take(8)
            ->get();

        $setting = Setting::first();

        return view('frontend.home', compact(
            'banners',
            'cars',
            'setting'
        ));
    }

    public function cars(Request $request)
    {
        $query = Car::query();

        if ($request->filled('search')) {

            $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('brand')) {

            $query->where('brand', $request->brand);
        }

        if ($request->filled('min_price')) {

            $query->where(
                'price',
                '>=',
                $request->min_price
            );
        }

        if ($request->filled('max_price')) {

            $query->where(
                'price',
                '<=',
                $request->max_price
            );
        }

        $cars = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $brands = Car::select('brand')
            ->distinct()
            ->pluck('brand');

        return view(
            'frontend.cars',
            compact(
                'cars',
                'brands'
            )
        );
    }

    public function carDetails($slug)
    {
        $car = Car::with('images')
            ->where('slug', $slug)
            ->firstOrFail();

        $setting = Setting::first();

        return view(
            'frontend.car-details',
            compact('car', 'setting')
        );
    }

    public function contact()
    {
        $setting = Setting::first();

        return view(
            'frontend.contact',
            compact('setting')
        );
    }

    public function storeMessage(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'nullable|email',

            'phone' => 'required',

            'message' => 'nullable',

        ]);

        ContactMessage::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'message' => $request->message,

        ]);

        return back()->with(
            'success',
            'Message Sent Successfully'
        );
    }

    public function about()
    {
        $about = AboutUs::first();

        return view(
            'frontend.about-us',
            compact('about')
        );
    }

    public function showrooms()
    {
        $showrooms = Showroom::latest()->get();

        return view(
            'frontend.showrooms',
            compact('showrooms')
        );
    }
}
