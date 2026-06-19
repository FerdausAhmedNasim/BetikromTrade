@extends('frontend.layouts.master')

@section('title', 'Cars')
@section('description', 'Browse available cars at ' . ($setting->site_name ?? 'Betikrom Trade'))

@section('content')
<div class="container py-5">

    <h2 class="mb-4 fw-bold">Available Cars</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search Car"
            >
        </div>
        <div class="col-md-2">
            <select name="brand" class="form-select">
                <option value="">All Brands</option>
                @foreach($brands as $brand)
                <option value="{{ $brand }}" @selected(request('brand') == $brand)>
                    {{ $brand }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <input
                type="number"
                name="min_price"
                class="form-control"
                placeholder="Min Price"
                value="{{ request('min_price') }}"
            >
        </div>
        <div class="col-md-2">
            <input
                type="number"
                name="max_price"
                class="form-control"
                placeholder="Max Price"
                value="{{ request('max_price') }}"
            >
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-primary w-100">
                <i class="bi bi-search me-1"></i>Search
            </button>
            @if(request()->anyFilled(['search','brand','min_price','max_price']))
                <a href="{{ url('/cars') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-x-lg"></i>
                </a>
            @endif
        </div>
    </form>

    <div class="row">
        @forelse($cars as $car)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 car-card">
                <img
                    src="{{ asset('storage/'.$car->image) }}"
                    class="card-img-top"
                    style="height:220px;object-fit:cover"
                    alt="{{ $car->name }}"
                >
                <div class="card-body d-flex flex-column">
                    <h5 class="mb-1">{{ $car->name }}</h5>
                    <p class="text-muted mb-2">{{ $car->brand }}</p>
                    <h4 class="text-primary mb-3">৳{{ number_format($car->price, 2) }}</h4>
                    <a href="{{ url('/car/'.$car->slug) }}" class="btn btn-dark w-100 mt-auto">
                        Details
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                No Cars Found
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $cars->links() }}
    </div>

</div>

<style>
    .car-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .car-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.12) !important;
    }
</style>
@endsection