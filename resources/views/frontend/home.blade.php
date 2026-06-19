@extends('frontend.layouts.master')

@section('content')

{{-- Banner Slider --}}

<div
    id="bannerSlider"
    class="carousel slide"
    data-bs-ride="carousel"
>

    <div class="carousel-inner">

        @foreach($banners as $key => $banner)

        <div
            class="carousel-item {{ $key == 0 ? 'active' : '' }}"
        >

            <img
                src="{{ asset('storage/'.$banner->image) }}"
                class="d-block w-100"
                style="height:500px;object-fit:cover"
            >

        </div>

        @endforeach

    </div>

    <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#bannerSlider"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#bannerSlider"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

{{-- Latest Cars --}}

<div class="container py-5">

    <div class="text-center mb-4">

        <h2>Latest Cars</h2>

    </div>

    <div class="row">

        @foreach($cars as $car)

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
                        Brand:
                        {{ $car->brand }}
                    </p>

                    <h4>
                        ৳{{ number_format($car->price,2) }}
                    </h4>

                    <a
                        href="{{ url('/car/'.$car->slug) }}"
                        class="btn btn-primary w-100"
                    >
                        View Details
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection