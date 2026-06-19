@extends('frontend.layouts.master')

@section('title','Cars')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Available Cars
    </h2>

    <form
        method="GET"
        class="row g-3 mb-4"
    >

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

            <select
                name="brand"
                class="form-select"
            >

                <option value="">
                    All Brands
                </option>

                @foreach($brands as $brand)

                <option
                    value="{{ $brand }}"
                    @selected(
                    request('brand') == $brand
                    )
                >
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

        <div class="col-md-2">

            <button
                class="btn btn-primary w-100"
            >
                Search
            </button>

        </div>

    </form>

    <div class="row">

        @forelse($cars as $car)

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card h-100 shadow-sm">

                <img
                    src="{{ asset('storage/'.$car->image) }}"
                    class="card-img-top"
                    style="height:220px;object-fit:cover"
                >

                <div class="card-body">

                    <h5>
                        {{ $car->name }}
                    </h5>

                    <p>
                        {{ $car->brand }}
                    </p>

                    <h4>
                        ৳{{ number_format($car->price,2) }}
                    </h4>

                    <a
                        href="{{ url('/car/'.$car->slug) }}"
                        class="btn btn-dark w-100"
                    >
                        Details
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning">

                No Cars Found

            </div>

        </div>

        @endforelse

    </div>

    {{ $cars->links() }}

</div>

@endsection